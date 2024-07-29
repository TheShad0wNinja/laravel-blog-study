<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required']
        ]);


        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        return back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        if (auth()->id() != $comment->author->id){
            return back();
        }

        $test = $post->comments()->firstWhere('id', $comment->id);
        if (!$test){
            return back();
        }

        $comment->delete();

        return back();
    }
}
