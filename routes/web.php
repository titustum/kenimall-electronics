<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // / Product Images
    Route::get('/admin/products/{product:id}/images/create', [ProductImageController::class, 'create'])->name('admin.products.images.create');
    Route::post('/admin/products/{product:id}/images', [ProductImageController::class, 'store'])->name('admin.products.images.store');
    Route::delete('/admin/products/{product:id}/images/{image}', [ProductImageController::class, 'destroy'])->name('admin.products.images.destroy');
});

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/return', [CheckoutController::class, 'return'])->name('checkout.return');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/track-order', [OrderController::class, 'trackForm'])->name('orders.track-form');
Route::post('/orders/track', [OrderController::class, 'track'])->name('orders.track');
Route::view('/order-not-found', 'orders.not-found')->name('orders.not-found');
Route::view('/orders/payment-failed', 'orders.payment-failed')->name('orders.payment-failed');

Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

Route::get('/get-shipping-quote/{postcode}/{weight}', [CheckoutController::class, 'getQuote'])->name('shipping.get.quote');
Route::post('/calculate-shipping', [CheckoutController::class, 'calculate'])->name('shipping.calculate');

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

// Admin Routes Group
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Product Routes
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::post('products/image/delete', [App\Http\Controllers\Admin\ProductController::class, 'deleteProductImage'])
        ->name('products.image.delete');
});



require __DIR__.'/auth.php';
