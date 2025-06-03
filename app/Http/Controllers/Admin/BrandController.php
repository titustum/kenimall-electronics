<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name', // Name must be unique
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is nullable as per schema
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('brands', 'public'); // Stores in storage/app/public/brands
            $validatedData['image_path'] = $imagePath;
        } else {
            $validatedData['image_path'] = null; // Ensure null if no image uploaded
        }

        // Assign the 'added_by' user ID
        // Your schema has a default(1) for added_by, but it's good practice
        // to explicitly set it if a user is logged in.
        // If user_id 1 is guaranteed to exist for default, you can keep default(1) in migration.
        $validatedData['added_by'] = Auth::id() ?? 1; // Use logged in user, or default to 1 if no user (e.g., during seeding)

        try {
            Brand::create($validatedData);

            return redirect()->route('admin.brands.index')
                             ->with('success', 'Brand created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating brand: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to create brand. Please try again.');
        }
    }



    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id, // Name must be unique, except for current brand
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if ($brand->image_path) {
                Storage::disk('public')->delete($brand->image_path); 
            }
            $imagePath = $request->file('image_path')->store('brands', 'public');
            $validatedData['image_path'] = $imagePath;
        } else {
            // If no new image is uploaded, retain the old one unless explicitly removed (not implemented here)
            $validatedData['image_path'] = $brand->image_path;
        }

        try {
            $brand->update($validatedData);

            return redirect()->route('admin.brands.index')
                             ->with('success', 'Brand updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating brand: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to update brand. Please try again.');
        }
    }

    /**
     * Display the specified brand.
     */
    public function show(Brand $brand)
    {
        // Eager load the 'addedBy' relationship if you want to display the user's name
        $brand->load('addedBy');
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            // Delete associated image if it exists
            if ($brand->image_path) {
                Storage::disk('public')->delete($brand->image_path);
            }

            $brand->delete();

            return redirect()->route('admin.brands.index')
                             ->with('success', 'Brand deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting brand: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->with('error', 'Failed to delete brand. Please try again.');
        }
    }
}
