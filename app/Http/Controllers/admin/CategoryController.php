<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = new Category([
            'category_name' => $request->category_name,
        ]);

        $category->save();

        return redirect('/admin/category/index')->with('message', 'Category Added Successfully');
    }

    public function index()
    {

        $category = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.category.index')
            ->with([
                'categories' => $category,
            ]);
    }

    public function edit($category)
    {
        $category_id = Crypt::decrypt($category);
        $category = Category::where('id', $category_id)->first();
        return view('admin.category.edit')
            ->with([
                'category' => $category,
            ]);
    }

    public function update(Request $request, $category)
    {
        $category_id = Crypt::decrypt($category);
        $category = Category::where('id', $category_id)->first();
        $request->validate([
            'category_name' => 'required',
        ]);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect('/admin/category/index')
            ->with('message', 'Category Updated Successfully.');
    }

    public function remove($category)
    {
        $category_id = Crypt::decrypt($category);
        $category = Category::where('id', $category_id)->first();
        $category->delete();
        return redirect('/admin/category/index')
            ->with('error', 'Record Deleted Successfully');

    }
}
