<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not typically used for orders created via frontend, but good to have for consistency
        // return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Orders are usually created via the frontend checkout process,
        // so this method might be less frequently used by admins directly.
        // You would add validation and creation logic here if needed.
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $order->load('user'); // Eager load the 'user' relationship
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order) // Using route model binding
    {
        $order->load('user'); // Eager load the 'user' relationship for customer details
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        try {
            if ($request->input('update_field') === 'status') {
                // Handle status update
                $validatedData = $request->validate([
                    'status' => 'required|string|in:pending,paid,shipped,delivered,cancelled',
                ]);
                $order->update(['status' => $validatedData['status']]);
                return back()->with('success', 'Order status updated successfully!');

            } elseif ($request->input('update_field') === 'shipping_tracking') {
                // Handle shipping tracking update
                $validatedData = $request->validate([
                    'tracking_number' => 'nullable|string|max:255',
                    'carrier' => 'nullable|string|max:255',
                ]);
                $order->update([
                    'tracking_number' => $validatedData['tracking_number'],
                    'carrier' => $validatedData['carrier'],
                ]);
                return back()->with('success', 'Shipping tracking information updated successfully!');

            } else {
                // Fallback for unexpected update_field or other update logic
                return back()->with('error', 'Invalid update request.');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Catch validation exceptions specifically
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating order: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to update order. Please try again.');
        }
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();

            return redirect()->route('admin.orders.index')
                             ->with('success', 'Order deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting order: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->with('error', 'Failed to delete order. Please try again.');
        }
    }
}