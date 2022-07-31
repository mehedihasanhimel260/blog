<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class commentsControler extends Controller
{
    public function commentStore(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'post_id' => 'required|integer',
                'name' => 'required|string',
                'email' => 'required|string',
                'comment' => 'required|string',
            ]
        );
        $comment = new Comment();
        $comment->post_id = $Request->post_id;
        $comment->name = $Request->name;
        $comment->email = $Request->email;
        $comment->comment = $Request->comment;
        $comment->save();
        return redirect()->back()->with('seccess', 'Comment Created');
    }
    public function manageComment()
    {
        $comment = Comment::get();
        return view('backend.comment.list', compact('comment'));
    }
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('seccess', 'comment Deleted');
    }
}