<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ensure $cart is available, and set default if empty
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Check if cart is empty, redirect if so
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('info', 'Your cart is empty. Please add items before checking out.');
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Process payment and create the order if payment succeeds immediately.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'regex:/^(\+?61|0)4\d{2}[ ]?\d{3}[ ]?\d{3}$|^(\+?61|0)[2-3,7-8]\d{7,8}$/', 'max:20'], // Australian phone regex
            'address' => 'required|string|max:255',
            'suburb' => 'required|string|max:255', // Renamed from city
            'state' => 'required|string|max:10',    // New: State (e.g., NSW, VIC)
            'postcode' => ['required', 'string', 'regex:/^\d{4}$/', 'max:4'], // New: Postcode (4 digits)
            'country' => 'required|string|max:255', // This will be 'AU' from hidden input
            'payment_method_id' => 'required|string',
        ]);

        $cart = session('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        $totalAmount = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $totalAmountInCents = $totalAmount * 100;

        // Stripe API key for AUD
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmountInCents,
                'currency' => 'aud', // Set currency to Australian Dollars
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('checkout.return'),
                'setup_future_usage' => 'off_session',
                'shipping' => [
                    'name' => $request->name,
                    'address' => [
                        'line1' => $request->address,
                        'city' => $request->suburb, // Map suburb to Stripe's city
                        'state' => $request->state,   // New
                        'postal_code' => $request->postcode, // New
                        'country' => 'AU', // Explicitly set for Stripe
                    ],
                    'phone' => $request->phone,
                ],
                'receipt_email' => $request->email,
            ]);

            // Handle 3D Secure or additional action
            if ($paymentIntent->status === 'requires_action') {
                session([
                    'checkout_name' => $request->name,
                    'checkout_email' => $request->email,
                    'checkout_phone' => $request->phone,
                    'checkout_address' => $request->address,
                    'checkout_suburb' => $request->suburb, // Store suburb
                    'checkout_state' => $request->state,     // Store state
                    'checkout_postcode' => $request->postcode, // Store postcode
                    'checkout_country' => $request->country, // Store AU
                    'payment_intent_id' => $paymentIntent->id,
                    'cart_for_return' => $cart,
                ]);

                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            }

            if ($paymentIntent->status === 'succeeded') {
                // If payment succeeds, create the order
                do {
                    $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6));
                } while (Order::where('order_number', $orderNumber)->exists());

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_number' => $orderNumber,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'suburb' => $request->suburb, // Save suburb
                    'state' => $request->state,     // Save state
                    'postcode' => $request->postcode, // Save postcode
                    'country' => $request->country, // Save AU
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
                Mail::to($order->email)->send(new OrderConfirmationMail($order));
                Log::info('Order ' . $order->id . ' placed and email sent successfully.');

                return redirect()->route('orders.show', $order)
                    ->with('success', 'Order placed successfully! You can track your order here.');
            }

            return redirect()->route('orders.payment-failed')->with('error', 'Payment was not completed.');
        } catch (\Stripe\Exception\CardException $e) {
            Log::error('Stripe Card Error during checkout: ' . $e->getMessage() . ' - Code: ' . $e->getStripeCode());
            return back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Checkout Error: ' . $e->getMessage() . ' - Trace: ' . $e->getTraceAsString());
            return back()->withInput()->with('error', 'An error occurred during payment. Please try again or contact support.');
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
                $name = session('checkout_name');
                $email = session('checkout_email');
                $phone = session('checkout_phone');
                $address = session('checkout_address');
                $suburb = session('checkout_suburb'); // Retrieve suburb
                $state = session('checkout_state');     // Retrieve state
                $postcode = session('checkout_postcode'); // Retrieve postcode
                $country = session('checkout_country'); // Retrieve AU
                $cart = session('cart_for_return');

                if (!$name || !$email || !$phone || !$address || !$suburb || !$state || !$postcode || !$country || !$cart || count($cart) === 0) {
                    Log::warning('Missing session data for order creation after 3D Secure for payment intent: ' . $paymentIntentId);
                    return redirect()->route('orders.payment-failed')->with('error', 'Missing session data for order creation after payment confirmation. Please contact support.');
                }

                do {
                    $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6));
                } while (Order::where('order_number', $orderNumber)->exists());

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_number' => $orderNumber,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'suburb' => $suburb, // Save suburb
                    'state' => $state,     // Save state
                    'postcode' => $postcode, // Save postcode
                    'country' => $country, // Save AU
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

                session()->forget([
                    'cart', 'checkout_name', 'checkout_email', 'checkout_phone', 'checkout_address',
                    'checkout_suburb', 'checkout_state', 'checkout_postcode', 'checkout_country',
                    'payment_intent_id', 'cart_for_return'
                ]);
                Mail::to($order->email)->send(new OrderConfirmationMail($order));
                Log::info('Order ' . $order->id . ' processed via return path and email sent successfully.');

                return redirect()->route('orders.show', $order)
                    ->with('success', 'Order placed and payment completed!');
            }

            return redirect()->route('orders.payment-failed')->with('error', 'Payment was not completed. Please try again.');
        } catch (\Stripe\Exception\CardException $e) {
            Log::error('Stripe Card Error during return path: ' . $e->getMessage() . ' - Code: ' . $e->getStripeCode());
            return redirect()->route('orders.payment-failed')->with('error', $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Checkout Return Error: ' . $e->getMessage() . ' - Trace: ' . $e->getTraceAsString());
            return redirect()->route('orders.payment-failed')->with('error', 'Payment error: ' . $e->getMessage());
        }
    }
}