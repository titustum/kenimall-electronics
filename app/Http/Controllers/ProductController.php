<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $filterName = 'All';
        $query = Product::query();

        // Handle category filter by slug (?category=electronics)
        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
                $filterName = $category->name;
            }
        }

        // Handle search filter (?q=earphones)
        if ($request->filled('q')) {
            $searchTerm = $request->input('q');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
            $filterName = 'Search results for: ' . $searchTerm;
        }

        // Handle checkbox filters (categories[], brands[])
        if ($request->has('categories') && is_array($request->categories)) {
            $query->whereIn('category_id', $request->categories);
            $filterName = 'Filtered';
        }

        if ($request->has('brands') && is_array($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
            $filterName = 'Filtered';
        }

        // Handle max price filter
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
            $filterName = 'Filtered';
        }

        // Handle condition filter
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
            $filterName = 'Filtered ';
        }

        // Handle in stock filter
        if ($request->boolean('in_stock')) {
            $query->where('stock', '>', 0);
            $filterName = 'Filtered';
        }

        // Paginate results with query string to keep filters in URL
        $products = $query->paginate(15)->withQueryString();

        $categories = Category::all();
        $brands = Brand::all();

        return view('products.index', compact('products', 'categories', 'brands', 'filterName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        $brands = Brand::all(); // Fetch all brands
        return view('products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'model' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'sometimes|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'condition' => 'nullable|string|max:255',
            'specifications' => 'nullable|array',
            'features' => 'nullable|array',
            'color' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'slug' => 'required|string|max:255|unique:products,slug',
        ]);

        // Handle specifications and features JSON data
        $specifications = null;
        if ($request->has('specifications')) {
            // Filter out empty values
            $specs = array_filter($request->specifications, function ($value) {
                return !empty($value);
            });
            
            if (!empty($specs)) {
                $specifications = json_encode($specs);
            }
        }

        $features = null;
        if ($request->has('features')) {
            // Filter out empty values
            $feats = array_filter($request->features, function ($value) {
                return !empty($value);
            });
            
            if (!empty($feats)) {
                $features = json_encode($feats);
            }
        }

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('products', $filename, 'public');
        }

        // Create the product
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->model = $request->model;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->is_featured = $request->has('is_featured');
        $product->added_by = Auth::id();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->condition = $request->condition;
        $product->specifications = $specifications;
        $product->features = $features;
        $product->color = $request->color;
        $product->image_path = $imagePath; 
        $product->slug = $request->slug; 
        
        $product->save();

        // Redirect back with success message
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Get related products in the same category, excluding current one
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('products.view', compact('product', 'relatedProducts'));
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
