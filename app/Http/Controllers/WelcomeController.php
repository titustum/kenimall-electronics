<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {

        $categories = \App\Models\Category::take(8)->get();
        $products = \App\Models\Product::take(8)->get();
        $topSellingProducts = Product::inRandomOrder()->take(8)->get();
        $brands = Brand::limit(10)->get();  // Fetch top 10 brands

        return view('welcome', compact('categories', 'products', 'topSellingProducts', 'brands'));
    }
}
