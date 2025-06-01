<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $categories = \App\Models\Category::take(8)->get();
        $products = \App\Models\Product::take(8)->get();
        $topSellingProducts = Product::orderBy('price', 'desc')->take(8)->get();
        return view('welcome', compact('categories', 'products', 'topSellingProducts'));
    }
}
