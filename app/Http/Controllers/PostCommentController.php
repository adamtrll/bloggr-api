<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\Comments\CommentResponse;
use App\Http\Resources\Comments\CommentCollectionResponse;

class PostCommentController extends Controller
{

    public function index(Post $post)
    {
        $comments = $post->comments()->paginate(10);
        return new CommentCollectionResponse($comments);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|min:1|max:255',
        ]);

        $comment = new Comment;
        $comment->message = $request->comment;
        $comment->user()->associate($request->user());

        $comment = $post->comments()->save($comment);

        return new CommentResponse($comment);
    }
}
