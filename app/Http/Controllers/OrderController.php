<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}
