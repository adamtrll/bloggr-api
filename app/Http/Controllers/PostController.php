<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use App\Models\Post;
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
        Gate::authorize('viewAny', Post::class);

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return new PostCollectionResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        Gate::authorize('create', Post::class);

        $post = $request
            ->user()
            ->posts()
            ->create($request->all());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view', $post);

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return response()->noContent();
    }
}
