<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Product: {{ $product->name }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Use PUT method for updates in Laravel resource controllers --}}

                {{-- Product Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product
                        Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('name') border-red-500 @enderror"
                        required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Product Description --}}
                <div>
                    <label for="description"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('description') border-red-500 @enderror"
                        required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Product Model --}}
                <div>
                    <label for="model"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model', $product->model) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('model') border-red-500 @enderror">
                    @error('model')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Price --}}
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price
                            (AUD$)</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                            step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('price') border-red-500 @enderror"
                            required>
                        @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sale Price --}}
                    <div>
                        <label for="sale_price"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sale Price
                            (AUD$)</label>
                        <input type="number" name="sale_price" id="sale_price"
                            value="{{ old('sale_price', $product->sale_price) }}" step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('sale_price') border-red-500 @enderror">
                        @error('sale_price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Stock --}}
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock
                        Quantity</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('stock') border-red-500 @enderror"
                        required>
                    @error('stock')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category (Dropdown) --}}
                <div>
                    <label for="category_id"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('category_id') border-red-500 @enderror"
                        required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) ==
                            $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Brand (Dropdown) --}}
                <div>
                    <label for="brand_id"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Brand</label>
                    <select name="brand_id" id="brand_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('brand_id') border-red-500 @enderror"
                        required>
                        <option value="">Select a Brand</option>
                        @foreach($brands as $brandOption) {{-- Renamed $brand to $brandOption to avoid conflict with
                        $product->brand --}}
                        <option value="{{ $brandOption->id }}" {{ old('brand_id', $product->brand_id) ==
                            $brandOption->id ? 'selected' : '' }}>
                            {{ $brandOption->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Condition --}}
                    <div>
                        <label for="condition"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Condition</label>
                        <select name="condition" id="condition"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('condition') border-red-500 @enderror">
                            <option value="">Select Condition</option>
                            <option value="New" {{ old('condition', $product->condition) == 'New' ? 'selected' : ''
                                }}>New</option>
                            <option value="Used" {{ old('condition', $product->condition) == 'Used' ? 'selected' : ''
                                }}>Used</option>
                            <option value="Refurbished" {{ old('condition', $product->condition) == 'Refurbished' ?
                                'selected' : '' }}>Refurbished</option>
                        </select>
                        @error('condition')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Color --}}
                    <div>
                        <label for="color"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('color') border-red-500 @enderror">
                        @error('color')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Main Product Image --}}
                <div>
                    <label for="image_path"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Image</label>
                    <input type="file" name="image_path" id="image_path"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('image_path') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload a new image to replace the current
                        one. Leave blank to keep existing.</p>
                    @error('image_path')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    @if ($product->image_path)
                    <div class="mt-4">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Image:</p>
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }} Image"
                            class="max-w-xs h-auto rounded-md shadow-md border border-gray-200 dark:border-neutral-700">
                    </div>
                    @endif
                </div>

                {{-- Is Featured Checkbox --}}
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured',
                        $product->is_featured) ? 'checked' : '' }}
                    class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded dark:bg-neutral-700
                    dark:border-neutral-600 dark:checked:bg-orange-500">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Mark as
                        Featured</label>
                    @error('is_featured')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug (Auto-generated or editable) --}}
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Slug (SEO
                        Friendly URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('slug') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave blank to auto-generate from product
                        name.</p>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.products.index') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">Cancel</a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Product
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- View Product Details --}}
                <a href="{{ route('admin.products.show', $product) }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    View Details
                </a>

                {{-- Delete Product Button --}}
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete Product
                    </button>
                </form>
            </div>
        </div>

    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'
            ],
            removePlugins: [
                'Image', 
                'ImageUpload', 
                'EasyImage', 
                'CKBox', 
                'CKFinder',              // ✅ remove CKFinder too
                'CKFinderUploadAdapter'  // ✅ already removed
            ],
        })
        .catch(error => {
            console.error(error);
        });
    </script>


</x-layouts.app>