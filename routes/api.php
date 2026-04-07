<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Topic;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('topics', function () {
    $topics = Topic::orderBy('name')->get();

    return new Resources\TopicCollection($topics);
});


Route::post('posts', function (Request $request) {
    $request->validate([
        'title' => 'required|string|min:3|max:100',
        'description' => 'required|string|min:20|max:250',
        'content' => 'required|string',
        'slug' => 'required|string|min:3|max:100|alpha_dash|unique:posts,slug',
        'topic_id' => ['required', 'exists:topics,id'],
    ]);

    $user = User::inRandomOrder()->first();

    $post = $user->posts()->create($request->all());

    return new Resources\Post($post);
});
