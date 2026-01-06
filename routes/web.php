<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;

/* 首頁 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/* 商城*/
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');

/* 購物車*/
Route::get('/cart_items', [CartItemController::class, 'index'])
    ->name('cart_items.index');

Route::post('/cart_items', [CartItemController::class, 'store'])
    ->name('cart_items.store');

/* 訂單 / Dashboard（一定要登入）*/
Route::middleware('auth')->group(function () {

    Route::resource('orders', OrderController::class);

    Route::get('/order/{product}', [OrderController::class, 'show'])
        ->name('order.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* Profile（ navbar 用）*/
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.edit');
});
