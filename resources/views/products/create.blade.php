<x-layouts.app>
    <div class="max-w-6xl px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Upload New Product</h2>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-lg shadow-md p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name -->
                <div class="col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                    <flux:input type="text" name="name" id="name" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="e.g., Samsung 65-inch 4K TV" />
                </div>

                <!-- Description -->
                <div class="col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <flux:textarea name="description" id="description" rows="4" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </flux:textarea>
                </div>

                <!-- Model Number -->
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model Number</label>
                    <flux:input type="text" name="model" id="model"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="e.g., Q90T" />
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug <span
                            class="text-red-500">*</span></label>
                    <flux:input type="text" name="slug" id="slug" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="samsung-65-inch-4k-tv" />
                    <p class="mt-1 text-xs text-gray-500">Must be unique, used for SEO-friendly URLs</p>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price <span
                            class="text-red-500">*</span></label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <flux:input type="number" name="price" id="price" step="0.01" required
                            class="pl-7 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                </div>

                <!-- Sale Price -->
                <div>
                    <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-1">Sale Price</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <flux:input type="number" name="sale_price" id="sale_price" step="0.01"
                            class="pl-7 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock <span
                            class="text-red-500">*</span></label>
                    <flux:input type="number" name="stock" id="stock" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                    <flux:select name="condition" id="condition"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Condition</option>
                        <option value="New">New</option>
                        <option value="Refurbished">Refurbished</option>
                        <option value="Used - Like New">Used - Like New</option>
                        <option value="Used - Good">Used - Good</option>
                        <option value="Used - Fair">Used - Fair</option>
                    </flux:select>
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category <span
                            class="text-red-500">*</span></label>
                    <flux:select name="category_id" id="category_id" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </flux:select>
                </div>

                <!-- Brand -->
                <div>
                    <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Brand <span
                            class="text-red-500">*</span></label>
                    <flux:select name="brand_id" id="brand_id" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </flux:select>
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                    <flux:input type="text" name="color" id="color"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="e.g., Black, Silver, White" />
                </div>

                <!-- Product Image -->
                <div class="col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                    <span>Upload a file</span>
                                    <input id="image" name="image_path" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <!-- Is Featured -->
                <div class="col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <flux:checkbox type="checkbox" name="is_featured" id="is_featured"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_featured" class="font-medium text-gray-700">Featured Product</label>
                            <p class="text-gray-500">This product will be displayed in featured sections.</p>
                        </div>
                    </div>
                </div>

                <!-- Specifications Section -->
                <div class="col-span-2">
                    <div class="mb-2">
                        <h3 class="text-lg font-medium text-gray-700">Technical Specifications</h3>
                        <p class="text-sm text-gray-500">Add detailed technical specifications</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-md mb-4">
                        <!-- Screen Size (for TVs/Monitors) -->
                        <div>
                            <label for="specifications.screen_size"
                                class="block text-sm font-medium text-gray-700 mb-1">Screen Size</label>
                            <flux:input type="text" name="specifications[screen_size]" id="specifications.screen_size"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., 65 inches" />
                        </div>

                        <!-- Resolution -->
                        <div>
                            <label for="specifications.resolution"
                                class="block text-sm font-medium text-gray-700 mb-1">Resolution</label>
                            <flux:input type="text" name="specifications[resolution]" id="specifications.resolution"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., 3840x2160 (4K)" />
                        </div>

                        <!-- Processor -->
                        <div>
                            <label for="specifications.processor"
                                class="block text-sm font-medium text-gray-700 mb-1">Processor</label>
                            <flux:input type="text" name="specifications[processor]" id="specifications.processor"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., Quantum Processor 4K" />
                        </div>

                        <!-- Refresh Rate -->
                        <div>
                            <label for="specifications.refresh_rate"
                                class="block text-sm font-medium text-gray-700 mb-1">Refresh Rate</label>
                            <flux:input type="text" name="specifications[refresh_rate]" id="specifications.refresh_rate"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., 120Hz" />
                        </div>

                        <!-- Connectivity -->
                        <div>
                            <label for="specifications.connectivity"
                                class="block text-sm font-medium text-gray-700 mb-1">Connectivity</label>
                            <flux:input type="text" name="specifications[connectivity]" id="specifications.connectivity"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., HDMI x4, USB x2, Ethernet" />
                        </div>

                        <!-- Dimensions -->
                        <div>
                            <label for="specifications.dimensions"
                                class="block text-sm font-medium text-gray-700 mb-1">Dimensions</label>
                            <flux:input type="text" name="specifications[dimensions]" id="specifications.dimensions"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="e.g., 57.1 x 32.7 x 2.3 inches" />
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="col-span-2">
                    <div class="mb-2">
                        <h3 class="text-lg font-medium text-gray-700">Product Features</h3>
                        <p class="text-sm text-gray-500">Add key features that make this product stand out</p>
                    </div>

                    <div class="p-4 bg-gray-50 rounded-md">
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="features.feature1"
                                    class="block text-sm font-medium text-gray-700 mb-1">Feature 1</label>
                                <flux:input type="text" name="features[feature1]" id="features.feature1"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    placeholder="e.g., HDR10+ Support" />
                            </div>

                            <div>
                                <label for="features.feature2"
                                    class="block text-sm font-medium text-gray-700 mb-1">Feature 2</label>
                                <flux:input type="text" name="features[feature2]" id="features.feature2"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    placeholder="e.g., Dolby Atmos Sound" />
                            </div>

                            <div>
                                <label for="features.feature3"
                                    class="block text-sm font-medium text-gray-700 mb-1">Feature 3</label>
                                <flux:input type="text" name="features[feature3]" id="features.feature3"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    placeholder="e.g., Smart TV with Voice Assistant" />
                            </div>

                            <div>
                                <flux:button type="button" id="addFeatureBtn"
                                    class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Feature
                                </flux:button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Hidden field for added_by -->
            <flux:input type="hidden" name="added_by" value="{{ Auth::id() }}" />

            <div class="mt-8 flex justify-end">
                <flux:button type="button"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                    Cancel
                </flux:button>
                <flux:button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Upload Product
                </flux:button>
            </div>
        </form>
    </div>

    <!-- JavaScript for dynamic feature fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addFeatureBtn = document.getElementById('addFeatureBtn');
            const featuresContainer = addFeatureBtn.parentElement.parentElement;
            let featureCount = 3;
            
            addFeatureBtn.addEventListener('click', function() {
                featureCount++;
                const newFeatureDiv = document.createElement('div');
                newFeatureDiv.innerHTML = `
                    <label for="features.feature${featureCount}" class="block text-sm font-medium text-gray-700 mb-1">Feature ${featureCount}</label>
                    <flux:input type="text" name="features[feature${featureCount}]" id="features.feature${featureCount}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Add another feature"/>
                `;
                featuresContainer.insertBefore(newFeatureDiv, addFeatureBtn.parentElement);
            });
        });
    </script>
</x-layouts.app>