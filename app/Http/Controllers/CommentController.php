<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\Comments\CommentResponse;

class CommentController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    /**
     * Reply to the specified resource in storage.
     */
    public function reply(Request $request, Comment $comment)
    {
        if ($comment->isReply) {
            return response()
                ->json(['message' => 'Cannot reply to a reply'], 422);
        }

        // todo: validate reply target to be a root comment
        $request->validate([
            'message' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        $reply = new Comment;
        $reply->message = $request->message;
        $reply->user()->associate($request->user());

        $comment->replies()->save($reply);

        return new CommentResponse($reply);
    }
}
