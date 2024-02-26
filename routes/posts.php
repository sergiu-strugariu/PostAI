<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/test', [PostController::class,"test"])->middleware(["auth"])->name("test");
