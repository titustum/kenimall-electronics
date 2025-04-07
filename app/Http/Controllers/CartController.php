<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Fetch all cart items for the authenticated user
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    // Add product to cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ],
            [
                'quantity' => $request->quantity,
                'price' => $product->price * $request->quantity,
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Remove product from cart
    public function destroy($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    // Update cart quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cartItem->update([
            'quantity' => $request->quantity,
            'price' => $cartItem->product->price * $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }
}