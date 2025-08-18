<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Mail\ShippingConfirmationMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // Import your OrderConfirmationMail class

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function trackForm()
    {
        return view('orders.track');
    }

    public function track(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $order = Order::where('order_number', $request->order_number)
            ->where('email', $request->email)
            ->first();

        if ($order) {
            return redirect()->route('orders.show', $order);
        }

        return redirect()->back()->with('error', 'Order not found. Please check your details.');
    }

    public function dispatchShippingConfirmation(Request $request, Order $order)
    {
        // --- IMPORTANT: Replace with actual data from your shipping system ---
        // In a real application, these would come from your database
        // or a response from a shipping API (e.g., Australia Post, Sendle, etc.)
        $trackingNumber = 'AP123456789AU'; // Example Australian Post tracking number
        $carrierName = 'Australia Post';
        $trackingUrl = 'https://auspost.com.au/mypost/track/#/details/'.$trackingNumber;
        // --- End of example data ---

        // Update the order status and save tracking details (assuming you have these columns)
        // You'd need to add 'tracking_number' and 'carrier' columns to your 'orders' table
        // via a migration, if you haven't already.
        $order->status = 'shipped';
        $order->tracking_number = $trackingNumber;
        $order->carrier = $carrierName;
        $order->save();

        // Send the email
        Mail::to($order->email)->send(
            new ShippingConfirmationMail($order, $trackingNumber, $carrierName, $trackingUrl)
        );

        // Redirect or return a response
        return redirect()->back()->with('success', 'Shipping confirmation email dispatched for order '.$order->order_number.'.');
    }
}
