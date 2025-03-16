<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $categories = \App\Models\Category::all();
        $products = \App\Models\Product::all();
        return view('welcome', compact('categories', 'products'));
    }
}
