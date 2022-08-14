<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedPosts;
use Illuminate\Http\Request;

class FeaturedPostsController extends Controller
{
    public function addFeaturPostForm()
    {
        return view("backend.featurpost.create");
    }
    public function FeaturPostStore(Request $request)
    {
        $category = new FeaturedPosts();
        $category->name = $request->category;
        $category->slug = str_replace(' ', '-', strtolower($request->category));
        $category->save();
        session()->flash('seccess', 'Category added');
        return redirect()->back();
    }
    public function manageFeaturPost()
    {
        $categorices = FeaturedPosts::get();
        return view("backend.featurpost.list", compact("categorices"));
    }
    public function editFeaturPost($id)
    {
        $category = FeaturedPosts::find($id);
        return view("backend.featurpost.edit", compact("category"));
    }
    public function updateFeaturPost(Request $request, $id)
    {
        $category = FeaturedPosts::find($id);
        $category->name = $request->category;
        $category->slug = str_replace(' ', '-', strtolower($request->category));
        $category->save();
        session()->flash('seccess', 'Category updated');
        return redirect('/manage/featurpost');
    }
    public function deleteFeaturPost($id)
    {
        $category = FeaturedPosts::find($id);
        $category->delete();
        session()->flash('seccess', 'Category Deleted');
        return redirect('/manage/featurpost');
    }
}
