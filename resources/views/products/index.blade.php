<x-custom-layout>

    <section class="bg-gray-50 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <aside class="bg-white p-6 rounded-2xl shadow-md space-y-6 max-w-sm">
                <h2 class="text-xl font-semibold text-gray-800">Filters</h2>

                <form id="filterForm">
                    <!-- Categories -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Categories</h3>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="text-teal-600 rounded focus:ring-teal-500">
                                <span class="text-sm text-gray-600">{{ $category->name }}</span>
                            </label>
                            @endforeach

                        </div>
                    </div>

                    <!-- Brands -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Brands</h3>
                        <div class="space-y-2">

                            @foreach ($brands as $brand)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                    class="text-teal-600 rounded focus:ring-teal-500">
                                <span class="text-sm text-gray-600">{{ $brand->name }}</span>
                            </label>
                            @endforeach

                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Max Price</h3>
                        <div class="space-y-2">
                            <input type="range" name="max_price" min="0" max="5000" value="2500"
                                class="w-full accent-teal-600" id="priceRange">
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>$0</span>
                                <span id="priceValue" class="font-medium text-teal-600">$2,500</span>
                                <span>$5,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Condition -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Condition</h3>
                        <select name="condition"
                            class="w-full border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500">
                            <option value="">All Conditions</option>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                            <option value="refurbished">Refurbished</option>
                        </select>
                    </div>

                    <!-- Stock -->
                    <div class="mb-6">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="in_stock" value="1"
                                class="text-teal-600 rounded focus:ring-teal-500">
                            <span class="text-sm text-gray-700">In Stock Only</span>
                        </label>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="space-y-3">
                        <button type="submit"
                            class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            Apply Filters
                        </button>
                        <button type="button" id="clearFilters"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                            Clear All
                        </button>
                    </div>
                </form>

                <!-- Active Filters Display -->
                <div id="activeFilters" class="mt-6 hidden">
                    <h4 class="font-medium text-gray-700 mb-2">Active Filters:</h4>
                    <div id="filterTags" class="flex flex-wrap gap-2"></div>
                </div>
            </aside>


            <!-- Product Grid -->
            <div class="md:col-span-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="products-grid">
                    @foreach ($products as $index => $product)
                    @php
                    $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));
                    $imageUrl = Storage::exists($product->image_path) ? Storage::url($product->image_path) :
                    $product->image_path;
                    $price = $product->sale_price ?? $product->price;
                    $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                        $delay = 200 + ($index * 50);
                        $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100)
                        : 0;
                        $rating = $product->average_rating ?? 4.5;
                        $reviewCount = $product->reviews_count ?? rand(50, 200);
                        @endphp

                        <div class="product-card {{ $filterClass }} bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 group relative border border-gray-100"
                            data-aos="fade-up" data-aos-delay="{{ $delay }}" data-price="{{ $price }}"
                            data-name="{{ $product->name }}" data-created="{{ $product->created_at }}">

                            <!-- Image -->
                            <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                <a href="{{ route('products.show', $product->slug) }}" class="block">
                                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                                        class="w-full h-64 object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                                        loading="lazy">
                                </a>

                                @if($hasSale)
                                <div class="absolute top-4 left-4 z-10">
                                    <div
                                        class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-percent mr-1"></i> {{ $discount }}% OFF
                                    </div>
                                </div>
                                @endif

                                @if($product->is_featured || $index < 3) <div
                                    class="absolute {{ $hasSale ? 'top-16' : 'top-4' }} left-4 z-10">
                                    <div
                                        class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-2 rounded-full text-xs font-bold shadow-lg animate-pulse">
                                        🔥 HOT
                                    </div>
                            </div>
                            @endif

                            @if($product->stock <= 5 && $product->stock > 0)
                                <div class="absolute bottom-4 left-4 z-10">
                                    <div class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Only {{ $product->stock }} left!
                                    </div>
                                </div>
                                @endif

                                <!-- Hover actions -->
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <div class="flex space-x-3">
                                        <button onclick="toggleWishlist({{ $product->id }})"
                                            class="bg-white text-gray-800 p-3 rounded-full hover:bg-red-50 hover:text-red-500 transition-all transform hover:scale-110 shadow-lg">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button onclick="quickAddToCart({{ $product->id }})"
                                            class="bg-orange-600 text-white p-3 rounded-full hover:bg-orange-700 transition-all transform hover:scale-110 shadow-lg">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>

                        <!-- Info -->
                        <div class="p-6 space-y-4">
                            <!-- Rating -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="flex text-yellow-400 text-sm">
                                        @for ($i = 1; $i <= 5; $i++) <i
                                            class="fas fa-star {{ $i <= $rating ? '' : 'text-gray-300' }}"></i>
                                            @endfor
                                    </div>
                                    <span class="text-gray-500 text-sm">({{ $reviewCount }} Reviews)</span>
                                </div>
                            </div>

                            <!-- Title -->
                            <a href="{{ route('products.show', $product->slug) }}" class="block">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 hover:text-teal-600 transition-colors line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <!-- Price -->
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-2xl font-bold text-teal-600">${{ number_format($price, 2)
                                        }}
                                    </span>

                                </div>
                                <div
                                    class="text-sm font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    <i
                                        class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2 pt-2">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="flex-1 bg-orange-600 text-white py-3 px-4 rounded-xl font-semibold text-center hover:bg-orange-700 transition-all transform hover:scale-105 shadow-md">
                                    View Details
                                </a>
                                @if($product->stock > 0)
                                <button onclick="quickAddToCart({{ $product->id }})"
                                    class="px-4 py-3 border-2 border-orange-600 text-orange-600 rounded-xl hover:bg-orange-600 hover:text-white transition-all transform hover:scale-105">
                                    <i class="fas fa-plus"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination (if needed) -->
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        </div>
        </div>
    </section>



    @push('scripts')

    <script>
        // Price range display
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        
        priceRange.addEventListener('input', function() {
            priceValue.textContent = '$' + parseInt(this.value).toLocaleString();
        });

        // Form submission
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            applyFilters();
        });

        // Clear filters
        document.getElementById('clearFilters').addEventListener('click', function() {
            document.getElementById('filterForm').reset();
            priceValue.textContent = '$2,500';
            document.getElementById('activeFilters').classList.add('hidden');
            console.log('Filters cleared');
        });

        function applyFilters() {
            const formData = new FormData(document.getElementById('filterForm'));
            const filters = {};
            
            // Collect selected categories
            const categories = formData.getAll('categories[]');
            if (categories.length > 0) filters.categories = categories;
            
            // Collect selected brands
            const brands = formData.getAll('brands[]');
            if (brands.length > 0) filters.brands = brands;
            
            // Get price range
            const maxPrice = formData.get('max_price');
            if (maxPrice && maxPrice > 0) filters.max_price = maxPrice;
            
            // Get condition
            const condition = formData.get('condition');
            if (condition) filters.condition = condition;
            
            // Get stock filter
            const inStock = formData.get('in_stock');
            if (inStock) filters.in_stock = true;
            
            // Display active filters
            displayActiveFilters(filters);
            
            // Here you would typically send the filters to your backend
            console.log('Applied filters:', filters);
            
            // Example: You could make an AJAX request here
            // fetch('/products/filter', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify(filters)
            // });
        }

        function displayActiveFilters(filters) {
            const activeFiltersDiv = document.getElementById('activeFilters');
            const filterTagsDiv = document.getElementById('filterTags');
            
            filterTagsDiv.innerHTML = '';
            
            if (Object.keys(filters).length === 0) {
                activeFiltersDiv.classList.add('hidden');
                return;
            }
            
            activeFiltersDiv.classList.remove('hidden');
            
            // Create filter tags
            Object.entries(filters).forEach(([key, value]) => {
                if (Array.isArray(value)) {
                    value.forEach(v => {
                        const tag = createFilterTag(key, v);
                        filterTagsDiv.appendChild(tag);
                    });
                } else {
                    const tag = createFilterTag(key, value);
                    filterTagsDiv.appendChild(tag);
                }
            });
        }

        function createFilterTag(key, value) {
            const tag = document.createElement('span');
            tag.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800';
            
            let displayText = '';
            switch(key) {
                case 'categories':
                    const categoryNames = ['Electronics', 'Clothing', 'Home & Garden', 'Sports'];
                    displayText = categoryNames[value - 1] || value;
                    break;
                case 'brands':
                    const brandNames = ['Apple', 'Samsung', 'Nike', 'Adidas'];
                    displayText = brandNames[value - 1] || value;
                    break;
                case 'max_price':
                    displayText = `Max: $${parseInt(value).toLocaleString()}`;
                    break;
                case 'condition':
                    displayText = value.charAt(0).toUpperCase() + value.slice(1);
                    break;
                case 'in_stock':
                    displayText = 'In Stock';
                    break;
                default:
                    displayText = value;
            }
            
            tag.innerHTML = `
                ${displayText}
                <button type="button" class="ml-1 text-teal-600 hover:text-teal-800" onclick="removeFilter('${key}', '${value}')">
                    ×
                </button>
            `;
            
            return tag;
        }

        function removeFilter(key, value) {
            // Logic to remove specific filter
            console.log(`Removing filter: ${key} = ${value}`);
            // You would implement the actual removal logic here
        }
    </script>

    @endpush
</x-custom-layout>