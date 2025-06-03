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
        $filterName = '';
        $query = Product::query();

        [$query, $filterName] = $this->applyCategoryFilter($request, $query, $filterName);
        [$query, $filterName] = $this->applySearchFilter($request, $query, $filterName);
        [$query, $filterName] = $this->applyCheckboxFilters($request, $query, $filterName);
        [$query, $filterName] = $this->applyPriceFilter($request, $query, $filterName);
        [$query, $filterName] = $this->applyConditionFilter($request, $query, $filterName);
        [$query, $filterName] = $this->applyStockFilter($request, $query, $filterName);

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();

        if(!isset($filterName )|| empty($filterName))
        {
            $filterName = 'All Products';
        }

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


    private function applyCategoryFilter(Request $request, $query, $filterName)
    {
        if ($request->filled('category')) {
            $category = Category::where('slug', $request->input('category'))->first();
            if ($category) {
                $query->where('category_id', $category->id);
                $filterName = $category->name;
            }
        }
        return [$query, $filterName];
    }

    private function applySearchFilter(Request $request, $query, $filterName)
    {
        if ($request->filled('q')) {
            // Split comma-separated search terms and trim whitespace
            $searchTerms = array_filter(array_map('trim', explode(',', $request->input('q'))));

            $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('name', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
                }
            });

            $filterName = 'Search results for: ' . implode(', ', $searchTerms);
        }

        return [$query, $filterName];
    }


    private function applyCheckboxFilters(Request $request, $query, &$filterName)
    {
        $labels = [];

        if ($request->has('categories') && is_array($request->categories)) {
            $query->whereIn('category_id', $request->categories);
            $categoryNames = Category::whereIn('id', $request->categories)->pluck('name')->toArray();
            $labels[] = 'Categories: ' . implode(', ', $categoryNames);
        }

        if ($request->has('brands') && is_array($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
            $brandNames = Brand::whereIn('id', $request->brands)->pluck('name')->toArray();
            $labels[] = 'Brands: ' . implode(', ', $brandNames);
        }

        if (!empty($labels)) {
            $filterName .= ($filterName ? ' | ' : '') . implode(' | ', $labels);
        }

        return [$query, $filterName];
    }


    private function applyPriceFilter(Request $request, $query, &$filterName)
    {
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
            $filterName .= ($filterName ? ' | ' : '') . 'Max Price: $' . number_format($request->max_price);
        }

        return [$query, $filterName];
    }


    private function applyConditionFilter(Request $request, $query, &$filterName)
    {
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
            $filterName .= ($filterName ? ' | ' : '') . ucfirst($request->condition) . ' Condition';
        }

        return [$query, $filterName];
    }


     private function applyStockFilter(Request $request, $query, &$filterName)
    {
        if ($request->boolean('in_stock')) {
            $query->where('stock', '>', 0);
            $filterName .= ($filterName ? ' | ' : '') . 'In Stock';
        }

        return [$query, $filterName];
    }


}
