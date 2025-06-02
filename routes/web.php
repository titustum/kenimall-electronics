<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
 

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index'); 
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle'); 

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store'); 
Route::get('/checkout/return', [CheckoutController::class, 'return'])->name('checkout.return');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('products' , ProductController::class);
Route::resource('categories' , CategoryController::class);  



require __DIR__.'/auth.php';
