<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

use App\Models\Topic;
use App\Http\Resources;

Route::get('topics', function () {
    $topics = Topic::orderBy('name')->get();

    return new Resources\TopicCollection($topics);
});

Route::get('posts', [Controllers\PostController::class, 'index']);
Route::get('posts/{post}', [Controllers\PostController::class, 'show']);

Route::get('posts/{post}/comments', [Controllers\PostCommentController::class, 'index']);

Route::post('login', [Controllers\AuthController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('posts', [Controllers\PostController::class, 'store']);
    Route::put('posts/{post}', [Controllers\PostController::class, 'update']);
    Route::delete('posts/{post}', [Controllers\PostController::class, 'destroy']);

    Route::post('posts/{post}/comments', [Controllers\PostCommentController::class, 'store']);

    Route::post('comments/{comment}/replies', [Controllers\CommentController::class, 'reply']);
});
