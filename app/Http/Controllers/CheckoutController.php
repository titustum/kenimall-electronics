<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function index()
    {
        $cart = session('cart', []);

        // Redirect if cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate cart total
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Process payment and create the order if payment succeeds immediately.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'payment_method_id' => 'required|string',
        ]);

        $cart = session('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        $totalAmount = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $totalAmountInCents = $totalAmount * 100;

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmountInCents,
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('checkout.return'),
            ]);

            // Handle 3D Secure or additional action
            if ($paymentIntent->status === 'requires_action') {
                session([
                    'checkout_name' => $request->name,
                    'checkout_email' => $request->email,
                    'checkout_address' => $request->address,
                    'payment_intent_id' => $paymentIntent->id,
                ]);

                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            }

            if ($paymentIntent->status === 'succeeded') {
                // Create unique order number
                do {
                    $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6));
                } while (Order::where('order_number', $orderNumber)->exists());

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_number' => $orderNumber,
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'total' => $totalAmount,
                    'status' => 'paid',
                    'payment_intent_id' => $paymentIntent->id,
                ]);

                foreach ($cart as $productId => $item) {
                    $order->items()->create([
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ]);
                }

                session()->forget('cart');

                return redirect()->route('orders.show', $order)
                    ->with('success', 'Order placed successfully! You can track your order here.');
            }

            return redirect()->route('orders.payment-failed')->with('error', 'Payment was not completed.');
        } catch (\Exception $e) {
            return redirect()->route('orders.payment-failed')->with('error', $e->getMessage());
        }
    }

    /**
     * Handle Stripe redirect after 3D Secure or similar confirmation.
     */
    public function return(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntentId = $request->query('payment_intent');

        if (!$paymentIntentId) {
            return redirect()->route('cart.index')->with('error', 'Invalid payment return.');
        }

        try {
            $order = Order::where('payment_intent_id', $paymentIntentId)->first();

            if ($order) {
                return redirect()->route('orders.show', $order)->with('info', 'Order already processed.');
            }

            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

            if ($paymentIntent->status === 'succeeded') {
                $cart = session('cart');

                if (!$cart || count($cart) === 0) {
                    $order = Order::where('payment_intent_id', $paymentIntentId)->first();
                    return $order
                        ? redirect()->route('orders.show', $order)->with('success', 'Your order was completed successfully.')
                        : redirect()->route('orders.not-found')->with('error', 'Order not found.');
                }

                $name = session('checkout_name');
                $email = session('checkout_email');
                $address = session('checkout_address');

                do {
                    $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6));
                } while (Order::where('order_number', $orderNumber)->exists());

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_number' => $orderNumber,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                    'status' => 'paid',
                    'payment_intent_id' => $paymentIntentId,
                ]);

                foreach ($cart as $productId => $item) {
                    $order->items()->create([
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ]);
                }

                session()->forget(['cart', 'checkout_name', 'checkout_email', 'checkout_address', 'payment_intent_id']);

                return redirect()->route('orders.show', $order)
                    ->with('success', 'Order placed and payment completed!');
            }

            return redirect()->route('orders.payment-failed')->with('error', 'Payment was not completed. Please try again.');
        } catch (\Exception $e) {
            return redirect()->route('orders.payment-failed')->with('error', 'Payment error: ' . $e->getMessage());
        }
    }


}
