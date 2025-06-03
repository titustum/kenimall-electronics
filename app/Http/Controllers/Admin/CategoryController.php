<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // Import Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // For logging errors
use Illuminate\Support\Facades\Storage; // For file storage
use Illuminate\Support\Str; // For slug generation

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(15); // Fetch all categories, paginated
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Added validation for image
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('categories', 'public'); // Stores in storage/app/public/categories
            $validatedData['image_path'] = $imagePath;
        } else {
            // If image is required, this else block might not be needed if validation handles it.
            // If image is nullable, set to null.
            $validatedData['image_path'] = null;
        }

        // Generate slug if not provided
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
            // Ensure unique slug if auto-generated
            $originalSlug = $validatedData['slug'];
            $count = 1;
            while (Category::where('slug', $validatedData['slug'])->exists()) {
                $validatedData['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // Assign the 'added_by' user ID
        $validatedData['added_by'] = Auth::id() ?? 1; // Use logged in user, or default to 1 if no user (e.g., during seeding)

        try {
            Category::create($validatedData);

            return redirect()->route('admin.categories.index')
                             ->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating category: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to create category. Please try again.');
        }
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        // Eager load the 'addedBy' relationship to get the user's name
        $category->load('addedBy');
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category) // Using route model binding
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category) // Using route model binding
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id, // Unique slug, ignoring current category's slug
            'image_path' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048', // Image is nullable on update
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if ($category->image_path) {
                Storage::disk('public')->delete($category->image_path);
            }
            $imagePath = $request->file('image_path')->store('categories', 'public');
            $validatedData['image_path'] = $imagePath;
        } else {
            // If no new image is uploaded, retain the old one
            $validatedData['image_path'] = $category->image_path;
        }

        // Generate slug if not provided, or ensure uniqueness if provided
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
            // Ensure unique slug if auto-generated, excluding current category
            $originalSlug = $validatedData['slug'];
            $count = 1;
            while (Category::where('slug', $validatedData['slug'])->where('id', '!=', $category->id)->exists()) {
                $validatedData['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // 'added_by' typically should not be updated here, as it signifies who initially added it.
        // If you need to track who last updated it, you'd add a 'last_updated_by' column.

        try {
            $category->update($validatedData);

            return redirect()->route('admin.categories.index')
                             ->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to update category. Please try again.');
        }
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // Delete associated image if it exists
            if ($category->image_path) {
                Storage::disk('public')->delete($category->image_path);
            }

            $category->delete();

            return redirect()->route('admin.categories.index')
                             ->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->with('error', 'Failed to delete category. Please try again.');
        }
    }
}