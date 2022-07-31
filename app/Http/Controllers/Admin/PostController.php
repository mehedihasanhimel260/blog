<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPostForm()
    {
        $categories = category::orderBy('id', 'DESC')->get();
        return view('backend.post.create', compact("categories"));
    }
    public function postStore(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'catecory_id' => 'required|integer',
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required',
            ]
        );
        if ($Request->file('image')) {
            $imagename = time() . '.' . $Request->image->extension();
            $Request->image->move('post/', $imagename);
        }
        $post = new Post();
        $post->catecory_id = $Request->catecory_id;
        $post->title = $Request->title;
        $post->user_id = session()->get('adminID');
        $post->slug = str_replace(' ', '-', strtolower($Request->title));
        $post->description = $Request->description;
        $post->image = $imagename;
        $post->save();
        return redirect()->back()->with('seccess', 'post Created');
    }
    public function managePost()
    {
        $posts = Post::with('category')->orderBy('id', 'DESC')->get();
        return view('backend.post.list', compact("posts"));
    }
    public function editPost($id)
    {
        $categories = category::orderBy('id', 'DESC')->get();
        $post = Post::find($id);
        return view('backend.post.edit', compact("categories", "post"));
    }
    public function updatePost(Request $Request, $id)
    {

        $this->validate(
            $Request,
            [
                'catecory_id' => 'required|integer',
                'title' => 'required|string',
                'description' => 'required|string',
            ]
        );
        $post = Post::find($id);
        if ($Request->file('image')) {
            if ($post->image && file_exists('post/' . $post->image)) {
                unlink('post/' . $post->image);
            }
            $imagename = time() . '.' . $Request->image->extension();
            $Request->image->move('post/', $imagename);
            $post->image = $imagename;
        }
        $post = Post::find($id);
        $post->user_id = session()->get('adminID');
        $post->slug = str_replace(' ', '-', strtolower($Request->title));
        $post->catecory_id = $Request->catecory_id;
        $post->title = $Request->title;
        $post->description = $Request->description;
        $post->save();
        return redirect()->back()->with('seccess', 'post Updated');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('seccess', 'post Deleted');
    }
}