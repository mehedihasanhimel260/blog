<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategoryForm()
    {
        return view("backend.category.create");
    }
    public function categoryStore(Request $request)
    {
        $category = new category();
        $category->name = $request->category;
        $category->slug = str_replace(' ', '-', strtolower($request->category));
        $category->save();
        session()->flash('seccess', 'Category added');
        return redirect()->back();
    }
    public function manageCategory()
    {
        $categorices = category::get();
        return view("backend.category.list", compact("categorices"));
    }
    public function editCategory($id)
    {
        $category = category::find($id);
        return view("backend.category.edit", compact("category"));
    }
    public function updateCategory(Request $request, $id)
    {
        $category = category::find($id);
        $category->name = $request->category;
        $category->slug = str_replace(' ', '-', strtolower($request->category));
        $category->save();
        session()->flash('seccess', 'Category updated');
        return redirect('/manage/category');
    }
    public function deleteCategory($id)
    {
        $category = category::find($id);
        $category->delete();
        session()->flash('seccess', 'Category Deleted');
        return redirect('/manage/category');
    }
}