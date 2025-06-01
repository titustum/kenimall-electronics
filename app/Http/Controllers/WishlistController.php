<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index() {
        $wishlist = session('wishlist', []);
        $products = \App\Models\Product::whereIn('id', $wishlist)->get();
        return view('wishlist.index', compact('products'));
    }


    public function toggle(Request $request)
    {
        $productId = $request->input('product_id');

        $wishlist = session()->get('wishlist', []);

        if (in_array($productId, $wishlist)) {
            // Remove from wishlist
            $wishlist = array_diff($wishlist, [$productId]);
            session()->put('wishlist', $wishlist);

            $wishlist_count = count($wishlist); 

            return response()->json(['success' => true, 'wishlist_count'=>$wishlist_count, 'message' => 'Removed from wishlist']);
        } else {
            // Add to wishlist
            $wishlist[] = $productId;
            session()->put('wishlist', array_unique($wishlist));

            $wishlist_count = count($wishlist);

            return response()->json(['success' => true, 'wishlist_count'=>$wishlist_count, 'message' => 'Added to wishlist']);
        }
    }

    
}
