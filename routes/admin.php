<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});
