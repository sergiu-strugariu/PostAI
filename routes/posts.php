<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class,"index"])->middleware(["auth"])->name("posts");
Route::get('/posts/create', [PostController::class,"create"])->middleware(["auth"])->name("posts.create");
