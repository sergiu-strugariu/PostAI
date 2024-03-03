<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TwitterAPIController;
use App\Http\Controllers\UnsplashApiController;
use App\Http\Controllers\LinkedinApiController;

Route::prefix('linkedin')->group(function () {
    Route::get('/oauth', [LinkedinApiController::class, 'getOauth'])->middleware(['auth'])->name('linkedin-oauth');
    Route::get('/callback', [LinkedinApiController::class, 'callback'])->name('linkedin-callback');
});

Route::prefix("unsplash")->group(function () {
    Route::get('/photos', [UnsplashApiController::class, 'getPhotos'])->middleware(['auth'])->name('unsplash-photos');
    Route::get('/oauth', [UnsplashApiController::class, 'getOauth'])->middleware(['auth'])->name('unsplash-oauth');
    Route::get('/callback', [UnsplashApiController::class, 'callback'])->name('unsplash-callback');
});

Route::prefix("twitter")->group(function () {
    Route::get('/oauth', [TwitterAPIController::class, 'getOauth'])->middleware(['auth'])->name('twitter-oauth');
    Route::get('/callback', [TwitterAPIController::class, 'callback'])->name('twitter-callback');
});

Route::prefix("posts")->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/update/{id}', [PostController::class, 'update'])->name('posts.update');
});
