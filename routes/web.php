<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::resource('products', ProductController::class);

// Resource Routes for products:
//
// products.index     → GET    /products                     → ProductController@index
// products.show      → GET    /products/{product}           → ProductController@show
// products.create    → GET    /products/create              → ProductController@create
// products.store     → POST   /products                     → ProductController@store
// products.edit      → GET    /products/{product}/edit      → ProductController@edit
// products.update    → PUT    /products/{product}           → ProductController@update
// products.destroy   → DELETE /products/{product}           → ProductController@destroy

