<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MiniShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/minishop', [Controller::class, 'minishop'])->name('minishop');
Route::post('/minishop/checkurl', [MiniShopController::class, 'checkUrl'])->name('checkUrl');
Route::get('/test', [Controller::class, 'test'])->name('test');

require __DIR__ . '/admin.php';