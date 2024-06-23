<?php

use App\Http\Controllers\Api\Blog\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blog/posts', [PostController::class, 'index']);
Route::get('/blog/posts/{id}', [PostController::class, 'show']);
