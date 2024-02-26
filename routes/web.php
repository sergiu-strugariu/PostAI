<?php

use Spark\Spark;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MiniShopController;
use App\Http\Controllers\ShortURLController;

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/pricing', [Controller::class, 'pricing'])->name('pricing');

Route::prefix('/short-url')->group(function () {
    Route::get('/', [ShortURLController::class, 'index'])->name('shorturl');
    Route::post('/', [ShortURLController::class, 'shortUrlStore'])->name('shortUrlStore');
});

Route::prefix('/minishop')->group(function () {
    Route::get('/', [MiniShopController::class, 'index'])->name('minishop');
    Route::post('/checkurl', [MiniShopController::class, 'checkUrl'])->name('minishop.checkUrl');
    Route::post('/order', [MiniShopController::class, 'order'])->name('minishop.order');
    Route::get('/orders', [MiniShopController::class, 'orders'])->name('minishop.orders');
});

Route::get('/{company}/{short_url}', [ShortURLController::class, 'redirectToUrl'])->name('redirectToUrl');

Route::get('/subUserTest', function () {
    $user = Auth::user();

    $subscription = $user->subscriptions()->create([
        'type' => 'default',
        'paddle_id' => fake()->unique()->numberBetween(1, 1000),
        'status' => 'active',
        'trial_ends_at' => null,
        'paused_at' => null,
        'ends_at' => null,
    ]);

    $subscription->items()->create([
        'product_id' => fake()->unique()->numberBetween(1, 1000),
        'price_id' => "pri_01hmtf6htyck7hk5axt6baa7fg",
        'status' => 'active',
        'quantity' => 1,
    ]);

    dd($subscription);

})->name('test');

/* Route::prefix('/twitter')->group(function () {
    Route::get('/', [TwitterController::class, 'index'])->name('twitter');
    Route::get('/login', [TwitterController::class, 'login'])->name('twitter.login');
    Route::get('/callback', [TwitterController::class, 'callback'])->name('twitter.callback');
    Route::get('/logout', [TwitterController::class, 'logout'])->name('twitter.logout');
    Route::get('/error', [TwitterController::class, 'error'])->name('twitter.error');
}); */

require __DIR__ . '/posts.php';
require __DIR__ . '/jetstream.php';
require __DIR__ . '/admin.php';


