<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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

use Illuminate\Support\Facades\Mail;

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
Route::resource('products' , ProductController::class);
Route::resource('categories' , CategoryController::class);  



Route::get('/test-email', function () {
    Mail::raw('This is a test email!', function ($message) {
        $message->to('test@example.com')->subject('Test Email');
    });
});

 
use App\Mail\ShippingConfirmationMail; // Import your Mailable
use App\Models\Order; // Import your Order model
use Illuminate\Support\Facades\Log;

Route::get('/test-shipping-email', function () {
    // 1. Find an existing order or create a dummy one for testing
    //    For a real test, you'd fetch an actual order from your database.
    //    Make sure this order has an email address you can check in Mailtrap.
    $order = Order::first(); // Tries to get the first order in your DB
    // If no order exists, create a dummy one (adjust details as needed)
    if (!$order) {
        $order = Order::create([
            'user_id' => null, // Or an existing user_id if you have users
            'order_number' => 'TEST-SHIP-' . strtoupper(Str::random(6)),
            'payment_intent_id' => 'pi_test_' . Str::random(10),
            'name' => 'Test Customer',
            'email' => 'test@example.com', // **IMPORTANT: Change this to your Mailtrap email or a real email you can check**
            'phone' => '0412345678',
            'address' => '123 Test Street',
            'suburb' => 'Sydney',
            'state' => 'NSW',
            'postcode' => '2000',
            'country' => 'AU',
            'total' => 99.99,
            'status' => 'shipped',
        ]);
        // Add dummy order items if needed for the email template to render fully
        // $order->items()->createMany([
        //     ['product_id' => 1, 'price' => 49.99, 'quantity' => 1],
        //     ['product_id' => 2, 'price' => 50.00, 'quantity' => 1],
        // ]);
    }

    // 2. Define dummy shipping details
    $trackingNumber = 'AUSPOST123456789';
    $carrierName = 'Australia Post';
    $trackingUrl = 'https://auspost.com.au/mypost/track/#/details/' . $trackingNumber; // Example AusPost tracking URL

    // 3. Send the email
    try {
        Mail::to($order->email)->send(
            new ShippingConfirmationMail($order, $trackingNumber, $carrierName, $trackingUrl)
        );
        return "Shipping confirmation email sent to " . $order->email . " for order " . $order->order_number . "!";
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error sending test shipping email: ' . $e->getMessage());
        return "Failed to send shipping confirmation email. Check logs for details. Error: " . $e->getMessage();
    }
});



require __DIR__.'/auth.php';
