<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'create'])->name('home');



Route::get('/test', [Controller::class, 'test'])->name('test');


Route::get('/links/{handel}/{slug}', [Controller::class, 'redirect'])->name('links.redirect'); //handel
Route::get('/links/{slug}', [Controller::class, 'dredirect'])->name('links.dredirect'); // default

require __DIR__ . '/admin.php';
