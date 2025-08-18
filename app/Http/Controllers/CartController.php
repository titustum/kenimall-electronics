<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    // Fetch all cart items for the authenticated user
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    // Add product to cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = \App\Models\Product::findOrFail($productId);
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale_price ?? $product->price,
                'quantity' => $quantity,
                'image' => Storage::exists($product->image_path) ? Storage::url($product->image_path) : $product->image_path,
            ];
        }

        session()->put('cart', $cart);

        // Return updated cart data
        $totalItems = collect($cart)->sum('quantity');
        $totalPrice = collect($cart)->sum(fn ($item) => $item['quantity'] * $item['price']);

        return response()->json([
            'success' => true,
            'message' => 'Added to cart!',
            'cart_count' => $totalItems,
            'cart_total' => number_format($totalPrice, 2),
        ]);
    }

    // Update cart quantity
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart has been cleared.');
    }

    public function destroy($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}
