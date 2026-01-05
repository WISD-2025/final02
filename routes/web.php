<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 商城
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');
Route::get('/shop/{product}', [ProductController::class, 'item'])->name('shop.item');

// 購物車
Route::post('/cart_items', [CartItemController::class, 'store'])->name('cart_items.store');
Route::get('/cart_items', [CartItemController::class, 'index'])->name('cart_items.index');

// 訂單（需登入）
Route::resource('orders', OrderController::class)->middleware(['auth']);

// 商品（後台 / API）
Route::resource('products', ProductController::class)->only([
    'index',
    'show',
    'store',
    'update',
]);
