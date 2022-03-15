<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product_image;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function create()
    {
        return view('admin.file.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
        ]);

        if ($request->hasfile('imageFile')) {

            foreach ($request->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }
        $image = new Product_image();
        $image->name = json_encode($data);
        $image->save();
        return back()->with('success', 'File has successfully uploaded!');

    }

    public function index(Product_image $image)
    {
        $image = $image->paginate(4);
        // $image = Image::get()->paginate(5);
        return view('admin.file.index')->
            with([
            'images' => $image,
        ]);
    }

    public function remove(Product_image $image)
    {
        $image->delete();
        return back()->with('error', 'Product-Image Removed Successfully.');
    }
}
