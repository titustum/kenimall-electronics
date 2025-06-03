<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     /**
     * Display a listing of the brands.
     */
    public function index()
    {
        $brands = Brand::orderBy('name')->paginate(15); // Adjust pagination limit as needed
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Display the specified brand.
     */
    public function show(Brand $brand)
    {
        // You'll need to create admin.brands.show blade for this
        return view('admin.brands.show', compact('brand')); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
