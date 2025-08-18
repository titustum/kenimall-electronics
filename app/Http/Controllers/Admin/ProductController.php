<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products, or paginate them for large datasets
        $products = Product::orderBy('name')->paginate(10); // Example: Fetch 10 products per page

        // Return the view with the products data
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'model' => 'nullable|string|max:255', // New
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price', // New: Must be less than price
            'stock' => 'required|integer|min:0',
            'is_featured' => 'boolean', // New
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'condition' => 'nullable|string|in:New,Used,Refurbished', // New
            'color' => 'nullable|string|max:50', // New
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // New: For image upload
            'slug' => 'nullable|string|max:255|unique:products,slug', // New: Unique slug
            // 'specifications' => 'nullable|json', // If you implement JSON fields later
            // 'features' => 'nullable|json',       // If you implement JSON fields later
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('products', 'public'); // Stores in storage/app/public/products
            $validatedData['image_path'] = $imagePath;
        }

        // Generate slug if not provided
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
            // Ensure unique slug if auto-generated
            $originalSlug = $validatedData['slug'];
            $count = 1;
            while (Product::where('slug', $validatedData['slug'])->exists()) {
                $validatedData['slug'] = $originalSlug.'-'.$count++;
            }
        }

        // Handle checkbox boolean conversion (if unchecked, it won't be in request)
        $validatedData['is_featured'] = $request->has('is_featured');

        // Add the 'added_by' user ID
        $validatedData['added_by'] = Auth::id(); // Assuming authenticated admin user

        try {
            Product::create($validatedData);

            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating product: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine());

            return back()->withInput()->with('error', 'Failed to create product. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        // Fetch categories and brands to populate dropdowns
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'model' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'condition' => 'nullable|string|in:New,Used,Refurbished',
            'color' => 'nullable|string|max:50',
            'image_path' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048', // Image is nullable on update
            'slug' => 'nullable|string|max:255|unique:products,slug,'.$product->id, // Unique slug, ignoring current product's slug
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $imagePath = $request->file('image_path')->store('products', 'public');
            $validatedData['image_path'] = $imagePath;
        } else {
            // If no new image is uploaded, retain the old one
            $validatedData['image_path'] = $product->image_path;
        }

        // Generate slug if not provided, or ensure uniqueness if provided
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
            // Ensure unique slug if auto-generated, excluding current product
            $originalSlug = $validatedData['slug'];
            $count = 1;
            while (Product::where('slug', $validatedData['slug'])->where('id', '!=', $product->id)->exists()) {
                $validatedData['slug'] = $originalSlug.'-'.$count++;
            }
        }

        // Handle checkbox boolean conversion (if unchecked, it won't be in request)
        $validatedData['is_featured'] = $request->has('is_featured');

        // 'added_by' should typically not change on update, it's set on creation.
        // If you need to update it, uncomment the line below and add validation.
        // $validatedData['added_by'] = auth()->id();

        try {
            $product->update($validatedData);

            return redirect()->route('admin.products.index')
                ->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating product: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine());

            return back()->withInput()->with('error', 'Failed to update product. Please try again.');
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {

        // Eager load relationships to avoid N+1 query problem
        $product->load(['category', 'brand', 'addedBy']);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Delete associated image if it exists
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $product->delete();

            return redirect()->route('admin.products.index')
                ->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting product: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine());

            return back()->with('error', 'Failed to delete product. Please try again.');
        }
    }
}
