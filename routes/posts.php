<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TwitterAPIController;


Route::prefix("twitter")->group(function () {
    Route::get('/oauth', [TwitterAPIController::class, 'getOauth'])->middleware(['auth'])->name('twitter-oauth');
    Route::get('/callback', [TwitterAPIController::class, 'callback'])->name('twitter-callback');
});

Route::prefix("posts")->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
});