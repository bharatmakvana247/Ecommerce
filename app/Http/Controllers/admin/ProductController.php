<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {

        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create')
            ->with([
                'categories' => $categories,
                'brands' => $brands,
            ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required|integer',
            'category_name' => 'required',
            'brand_name' => 'required',
            'product_image' => 'required|mimes:png,jpg,jpeg,pdf,xls',
            'product_image_gallery' => 'required',
            'product_image_gallery.*' => 'mimes:png,jpg,jpeg,pdf,xls',
        ]);

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

        //Get File Data using File
        $file = $request->file('product_image');

        //File Input Function
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getClientMimeType();
        $getFileName = $file->getFilename();
        $size = $file->getSize();
        // dd($size);

        //Original File name to Upload
        $originalFilename = $file->getClientOriginalName();

        //Upload on Public Folder
        Storage::disk('public')->put($originalFilename, File::get($file));

        if ($request->hasfile('product_image_gallery')) {
            foreach ($request->file('product_image_gallery') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }
        $product = new Product([
            'product_name' => $request->product_name,
            'product_details' => $request->product_details,
            'product_price' => $request->product_price,
            'category_name' => $request->category_name,
            'brand_name' => $request->brand_name,
            'product_image' => $originalFilename,
            'product_image_gallery' => json_encode($data),
        ]);

        $product->save();

        // return json_encode([
        //     'message' => 'Product Added Successfully.',
        // ]);

        return redirect('/admin/product/index')->with('message', 'Product Added Successfully.');
    }

    public function index(Product $product)
    {
        // $products = Product::withTrashed()->get();
        // $products = Product::onlyTrashed()->get();
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.product.index')
            ->with([
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands,
            ]);

    }

    public function edit($product)
    {
        $product_id = Crypt::decrypt($product);
        $product = Product::where('id', $product_id)->first();
        $categories = Category::all();
        // $products = Product::withTrashed()->get();
        // $products = Product::onlyTrashed()->get();
        $brands = Brand::all();
        $products = $product->paginate(5);
        return view('admin.product.edit')
            ->with([
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands,
            ]);
    }

    public function update(Request $request, $product)
    {

        $product_id = Crypt::decrypt($product);
        $product = Product::where('id', $product_id)->first();

        $request->validate([
            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
        ]);
        //Get File Data using File
        $file = $request->file('product_image');

        //File Input Function
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getClientMimeType();
        $getFileName = $file->getFilename();

        //Original File name to Upload
        $originalFilename = $file->getClientOriginalName();

        //Upload on Public Folder
        Storage::disk('public')->put($originalFilename, File::get($file));
        $product->update([
            'product_name' => $request->product_name,
            'product_details' => $request->product_details,
            'product_price' => $request->product_price,
            'product_image' => $originalFilename,
            'brand_name' => $request->brand_name,
            'category_name' => $request->category_name,

        ]);

        $product->save();

        return redirect('/admin/product/index')
            ->with([
                'message' => 'Product Updated Successfully',
            ]);
    }

    public function delete($product)
    {
        $product_id = Crypt::decrypt($product);
        $product = Product::where('id', $product_id)->first();

        $image_path = public_path() . '/uploads/' . $product->product_image;
        //Delete file usding path
        File::delete($image_path);
        $product->delete();
        return redirect('admin/product/index')
            ->with('error', 'Product Deleted Successfully');
    }
}
