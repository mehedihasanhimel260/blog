<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\category;
use App\Models\Comment;
use App\Models\pageOption;
use App\Models\Section;
use Illuminate\Http\Request;

class ForntendController extends Controller
{
    public function show(Request $Request)
    {
        $webOptions = pageOption::get();
        $Section = Section::find(1);
        $id = $Section->section_1;
        $featureposts = Post::with('category')->where('catecory_id', $id)->paginate(2);
        $categories = category::orderBy('id', 'DESC')->get();
        $posts = Post::with('category')->paginate(3);
        return view('frontend.home.index', compact('categories', 'posts', 'featureposts', 'webOptions'));
    }
    public function singlepost($id)
    {
        $comment = Comment::where('post_id', $id)->get();
        $post = Post::with('user')->find($id);
        return view('frontend.home.singlepost', compact('post', 'comment'));
    }
    public function categoryPost($id)
    {
        $categoryPost = Post::where('catecory_id', $id)->paginate(3);
        return view('frontend.home.categorypost', compact('categoryPost'));
    }
    public function aboutus()
    {
        return view('frontend.home.aboutus');
    }
    public function contactus()
    {
        return view('frontend.home.contactus');
    }
}
