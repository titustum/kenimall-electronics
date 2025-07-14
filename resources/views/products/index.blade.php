<x-custom-layout>

    <section class="bg-gray-50 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">


            <!-- Button to toggle filters on small screens -->
            <div class="lg:hidden mb-4">
                <button onclick="toggleFiltersVisibility()" id="toggleFilters"
                    class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    Show Filters
                </button>
            </div>


            <!-- Sidebar Filters -->
            <aside id="aside-filters"
                class="bg-white p-6 rounded-2xl shadow-md space-y-6 max-w-sm hidden lg:block transition duration-300">
                <h2 class="text-xl font-semibold text-gray-800">Filters</h2>

                <form id="filterForm" method="GET" action="{{ route('products.index') }}">
                    <!-- Categories -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Categories</h3>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="text-teal-600 rounded focus:ring-teal-500" {{ is_array(request('categories'))
                                    && in_array($category->id, request('categories')) ? 'checked' : '' }}>
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
                                    class="text-teal-600 rounded focus:ring-teal-500" {{ is_array(request('brands')) &&
                                    in_array($brand->id, request('brands')) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-600">{{ $brand->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Max Price -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Max Price</h3>
                        <div class="space-y-2">
                            @php
                            $maxPrice = request('max_price', 2500);
                            @endphp
                            <input type="range" name="max_price" min="0" max="5000" value="{{ $maxPrice }}"
                                class="w-full accent-teal-600" id="priceRange">
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>$0</span>
                                <span id="priceValue" class="font-medium text-teal-600">${{ number_format($maxPrice)
                                    }}</span>
                                <span>$5,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Condition -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-700 mb-3">Condition</h3>
                        <select name="condition"
                            class="w-full border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500">
                            <option value="" {{ request('condition')=='' ? 'selected' : '' }}>All Conditions</option>
                            <option value="new" {{ request('condition')=='new' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ request('condition')=='used' ? 'selected' : '' }}>Used</option>
                            <option value="refurbished" {{ request('condition')=='refurbished' ? 'selected' : '' }}>
                                Refurbished</option>
                        </select>
                    </div>

                    <!-- In Stock -->
                    <div class="mb-6">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="in_stock" value="1"
                                class="text-teal-600 rounded focus:ring-teal-500" {{ request('in_stock')=='1'
                                ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">In Stock Only</span>
                        </label>
                    </div>

                    <!-- Buttons -->
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
            </aside>




            <!-- Product Grid -->
            <div class="md:col-span-3">

                <div
                    class="py-4 px-4 sm:py-6 sm:px-6 bg-gradient-to-r from-orange-600 to-teal-600 rounded-xl shadow-lg text-white text-center max-w-full">

                    <h1 class="text-lg sm:text-2xl font-extrabold tracking-tight truncate max-w-full mx-auto leading-tight"
                        title="{{ $filterName ?? 'All Products' }}">
                        {{ Str::limit($filterName ?? 'All Products', 80, '...') }}
                    </h1>

                    @if(request()->has('q') || request()->has('categories') || request()->has('brands'))
                    <p class="mt-1 text-xs sm:text-sm text-orange-100">
                        Showing filtered results based on your selection.
                    </p>
                    @endif
                </div>




                <div class="mt-6 grid grid-cols-2 gap-2 md:gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-8"
                    id="products-grid">
                    @foreach ($products as $index => $product)
                    @php
                    $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));

                    $price = $product->sale_price ?? $product->price;
                    $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                        $delay = 200 + ($index * 50);
                        $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100)
                        : 0;
                        $rating = $product->average_rating ?? 4.5;
                        $reviewCount = $product->reviews_count ?? rand(50, 200);
                        @endphp

                        <div class="product-card {{ $filterClass }} bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition-all hover:scale-[1.02] duration-300 relative border border-gray-100"
                            data-aos="fade-up" data-aos-delay="{{ $delay }}" data-price="{{ $price }}"
                            data-name="{{ $product->name }}" data-created="{{ $product->created_at }}">

                            <!-- Image -->
                            <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}"
                                        class="w-full h-40 sm:h-48 md:h-56 object-contain p-3 transition-transform duration-300 group-hover:scale-105"
                                        loading="lazy" />
                                </a>

                                <!-- Discount Badge -->
                                @if($hasSale)
                                <div class="hidden lg:block absolute top-3 left-3 z-10">
                                    <div
                                        class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-2 py-1 text-xs rounded-full font-bold shadow">
                                        <i class="fas fa-percent mr-1"></i>{{ $discount }}% OFF
                                    </div>
                                </div>
                                @endif

                                <!-- HOT Badge -->
                                @if($product->is_featured || $index < 3) {{-- <div
                                    class="absolute {{ $hasSale ? 'top-12' : 'top-3' }} left-3 z-10">
                                    <div
                                        class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-2 py-1 text-xs rounded-full font-bold shadow animate-pulse">
                                        🔥 HOT
                                    </div>
                            </div> --}}
                            @endif

                            <!-- Stock Badge -->
                            @if($product->stock <= 5 && $product->stock > 0)
                                <div class="absolute bottom-3 left-3 z-10">
                                    <div class="bg-orange-500 text-white px-2 py-1 text-xs rounded-full font-semibold">
                                        Only {{ $product->stock }} left!
                                    </div>
                                </div>
                                @endif

                                <!-- Hover Actions -->
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <div class="flex space-x-2">
                                        <button onclick="toggleWishlist({{ $product->id }})"
                                            class="bg-white p-2 rounded-full text-gray-700 hover:text-red-500 hover:bg-red-50 shadow transition transform hover:scale-110">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button onclick="quickAddToCart({{ $product->id }})"
                                            class="bg-orange-600 p-2 rounded-full text-white hover:bg-orange-700 shadow transition transform hover:scale-110">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>

                        <!-- Info -->
                        <div class="p-4 sm:p-5 space-y-3 text-sm sm:text-base">

                            <!-- Rating -->
                            <div class="flex items-center justify-between text-xs sm:text-sm">
                                <div class="flex items-center space-x-1 text-yellow-400">
                                    @for ($i = 1; $i <= 5; $i++) <i
                                        class="fas fa-star {{ $i <= $rating ? '' : 'text-gray-300' }}"></i>
                                        @endfor
                                        <span class="text-gray-500 ml-1">({{ $reviewCount }})</span>
                                </div>
                            </div>

                            <!-- Name -->
                            <a href="{{ route('products.show', $product->slug) }}">
                                <h3
                                    class="text-base sm:text-lg font-semibold text-gray-900 hover:text-blue-600 transition line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <!-- Description -->
                            <p class="text-gray-600 text-xs sm:text-sm line-clamp-2">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <!-- Price & Stock -->
                            <div class="flex items-center justify-between pt-2 border-t border-gray-200">
                                <span class="text-blue-600 font-bold text-lg sm:text-xl">${{ number_format($price, 2)
                                    }}</span>
                                {{-- <span
                                    class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold text-xs sm:text-sm">
                                    <i
                                        class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span> --}}
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="flex-1 bg-orange-600 text-white text-center py-2 rounded-lg text-sm font-semibold hover:bg-orange-700 transition hover:scale-105">
                                    View
                                </a>
                                @if($product->stock > 0)
                                <button onclick="quickAddToCart({{ $product->id }})"
                                    class="px-3 py-2 border border-orange-600 text-orange-600 rounded-lg hover:bg-orange-600 hover:text-white transition hover:scale-105">
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
        function toggleFiltersVisibility() {
        const filters = document.getElementById('aside-filters');
        const toggleButton = document.getElementById('toggleFilters');

        const isHidden = filters.classList.contains('hidden');

        filters.classList.toggle('hidden');
        toggleButton.textContent = isHidden ? 'Hide Filters' : 'Show Filters';
    }
    </script>


    <script>
        const priceRange = document.getElementById('priceRange');
            const priceValue = document.getElementById('priceValue');
            const clearBtn = document.getElementById('clearFilters');

            // Update price value display live
            priceRange.addEventListener('input', () => {
                priceValue.textContent = `$${parseInt(priceRange.value).toLocaleString()}`;
            });

            // Clear filters button resets form and reloads page without query params
            clearBtn.addEventListener('click', () => {
                document.getElementById('filterForm').reset();
                window.location.href = "{{ route('products.index') }}";
            });
    </script>


    @endpush
</x-custom-layout>