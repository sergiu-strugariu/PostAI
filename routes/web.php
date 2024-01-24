<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'create'])->name('home');
Route::get('/test', [Controller::class, 'test'])->name('test');

require __DIR__ . '/admin.php';