<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('/dashboard/admin')->group(function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
    
        Route::get('/minishop', [DashboardController::class, 'minishop'])->name('admin.minishop');
        Route::post('/minishop', [DashboardController::class, 'minishopStore'])->name('admin.minishop.post');
    });
});
