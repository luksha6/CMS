<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Post $post){

        $post->addComment(request('body'));
        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id == Auth::user()->id)
        {
            $comment->delete();
        }
        else if((Auth::user()->role=='admin')||(Auth::user()->role=='moderator'))
        {
            $comment->delete();
        }
        return back();

    }

}
