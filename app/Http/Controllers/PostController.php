<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Resources\Post as PostResource;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection as PostCollectionResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return new PostCollectionResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $user = User::inRandomOrder()->first();

        $post = $user->posts()->create($request->all());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
