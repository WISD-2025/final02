<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cart_items', [CartItemController::class, 'index'])->name('cart_items.index');
Route::resource('orders', OrderController::class)->middleware(['auth']);
Route::resource('products',ProductController::class)->only([
    'index',
    'show',
    'store',
    'update',
]);
/* 一、
  products.index    GET                  /                       ProductController@index
                    列出所有產品
  products.store    POST                products                 ProductController@store
                    儲存新增的產品
  products.create   GET                 products                 ProductController@create
                    產生產品新增的表單
  products.show     GET|HEAD            products/{product}       ProductController@show
                    檢視某一產品
  products.update   PUT|PATCH           products/{product}       ProductController@update
                    更新某一產品
  products.destroy  DELETE              products/{product}       ProductController@destroy
                    刪除某一產品
  products.edit     GET|HEAD            products/{product}/edit  ProductController@edit
                    產生某一品牌修改的表單

  二、
  Route::get('products', [ProductController::class, 'index']);
  Route::get('products/create', [ProductController::class, 'create']);
  Route::post('products', [ProductController::class, 'store']);
  Route::get('products/{product}', [ProductController::class, 'show']);
  Route::get('products/{product}/edit', [ProductController::class, 'edit']);
  Route::put('products/{product}', [ProductController::class, 'update']);
  Route::delete('products/{product}', [ProductController::class, 'destroy']);
*/
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// Resource Routes for products:
//
// products.index     → GET    /products                     → ProductController@index
// products.show      → GET    /products/{product}           → ProductController@show
// products.create    → GET    /products/create              → ProductController@create
// products.store     → POST   /products                     → ProductController@store
// products.edit      → GET    /products/{product}/edit      → ProductController@edit
// products.update    → PUT    /products/{product}           → ProductController@update
// products.destroy   → DELETE /products/{product}           → ProductController@destroy

