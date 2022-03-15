<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BrandController extends Controller
{
    //
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);

        try {
            $brand = new Brand([
                'brand_name' => $request->brand_name,
            ]);

            $brand->save();

            return redirect('/admin/brand/index')->with('message', 'Brand Added Successfully.');

        } catch (\Exception $e) {
            return back()->with([
                'alert-type' => 'danger',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $brand = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('admin.brand.index')
            ->with([
                'brands' => $brand,
            ]);
    }

    public function edit(Brand $brand, $id)
    {
        $id = Crypt::decrypt($id);
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit')
            ->with([
                'brand' => $brand,
            ]);
    }

    public function update(Brand $brand, Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $brand = Brand::where('id', $id)->first();
        $request->validate([
            'brand_name' => 'required',
        ]);

        $brand->update([
            'brand_name' => $request->brand_name,
        ]);

        return redirect('/admin/brand/index')->with('message', 'Brand Updated SuccessFully.');
    }

    public function remove($brand)
    {
        $brand_id = Crypt::decrypt($brand);
        $brand = Brand::where('id', $brand_id)->first();
        $brand->delete();
        return redirect('/admin/brand/index')->with('error', 'Brand Deleted Successfully');
    }
}
