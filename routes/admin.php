<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('/dashboard/admin')->group(function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
    
        Route::get('/minishop/pricing', [DashboardController::class, 'minishopPricing'])->name('admin.minishop.pricing');
        Route::post('/minishop/pricing', [DashboardController::class, 'minishopStorePricing'])->name('admin.minishop.post');

        Route::get('/minishop/orders', [DashboardController::class, 'minishopOrders'])->name('admin.minishop.orders');
        Route::post('/minishop/orders', [DashboardController::class, 'minishopOrdersStore'])->name('admin.minishop.orders.store');
    });
});
