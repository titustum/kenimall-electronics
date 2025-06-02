<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     **/
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'payment_method_id' => 'required|string', // token from Stripe.js client
        ]);

        $cart = session('cart');
        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        $totalAmount = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $totalAmountInCents = $totalAmount * 100; // Stripe uses cents

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmountInCents,
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('checkout.return'),  // Add a route for return after redirects
            ]);

            // Check if payment succeeded
            if ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
                // Payment requires additional actions (e.g. 3D Secure)
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            } elseif ($paymentIntent->status == 'succeeded') {
                // Payment successful - Save Order and Order Items

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'total' => $totalAmount,
                    'status' => 'paid',
                ]);

                foreach ($cart as $productId => $item) {
                    $order->items()->create([
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ]);
                }

                session()->forget('cart');

                // return response()->json(['success' => true, 'message' => 'Order placed successfully!']);  
                return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully! You can track your order here.');

            } else {
                return response()->json(['error' => 'Payment failed.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function return(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntentId = $request->query('payment_intent');

        if (!$paymentIntentId) {
            return redirect()->route('cart.index')->with('error', 'Invalid payment return.');
        }

        try {
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

            if ($paymentIntent->status === 'succeeded') {
                $cart = session('cart');

                // If cart is empty, assume order was already placed
                if (!$cart || count($cart) === 0) {
                    return redirect()->route('orders.show')->with('success', 'Your order was completed successfully.');
                }

                // Retrieve checkout data saved in session
                $name = session('checkout_name');
                $email = session('checkout_email');
                $address = session('checkout_address');

                // Create new order
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                    'status' => 'paid',
                ]);

                // Save each order item
                foreach ($cart as $productId => $item) {
                    $order->items()->create([
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ]);
                }

                // Clear the session data related to checkout and cart
                session()->forget(['cart', 'checkout_name', 'checkout_email', 'checkout_address']);

                // Redirect to the single order page with success message
                return redirect()->route('orders.show', $order)->with('success', 'Order placed and payment completed!');
            }

            return redirect()->route('cart.index')->with('error', 'Payment was not completed. Please try again.');

        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Payment error: ' . $e->getMessage());
        }
    }

     
}
