<x-custom-layout>


    <!-- Wished Products Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100 mt-16" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-gradient-to-r from-purple-100 to-pink-100 px-4 py-2 rounded-full text-purple-700 font-medium mb-4">
                    <i class="fas fa-heart mr-2"></i>
                    Wishes
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Wished Products</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Find your favorite products at your disposal
                </p>
            </div>

            @if($products->count())

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 transition-all duration-500"
                id="products-grid">
                @foreach ($products as $index => $product)
                @php
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));

                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                    $delay = 200 + ($index * 50);
                    $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100)
                    :
                    0;
                    $rating = $product->average_rating ?? 4.5;
                    $reviewCount = $product->reviews_count ?? rand(50, 200);
                    @endphp

                    <div class="product-card {{ $filterClass }} bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 group relative border border-gray-100"
                        data-aos="fade-up" data-aos-delay="{{ $delay }}" data-price="{{ $price }}"
                        data-name="{{ $product->name }}" data-created="{{ $product->created_at }}">

                        <!-- Product Image Container -->
                        <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <a href="{{ route('products.show', $product->slug) }}" class="block">
                                <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}"
                                    class="w-full h-64 object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy">
                            </a>

                            <!-- Badge -->
                            <button onclick="toggleWishlist({{ $product->id }})" class="absolute top-4 left-4 z-10">
                                <div
                                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg">
                                    <i class="fas fa-heart mr-1"></i>
                                </div>
                            </button>


                            <!-- Stock Status -->
                            @if($product->stock <= 5 && $product->stock > 0)
                                <div class="absolute bottom-4 left-4 z-10">
                                    <div class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Only {{ $product->stock }} left!
                                    </div>
                                </div>
                                @endif

                                <!-- Action Buttons -->
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

                        <!-- Product Info -->
                        <div class="p-6 space-y-4">
                            <!-- Rating -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="flex text-yellow-400 text-sm">
                                        @for ($i = 1; $i <= 5; $i++) <i
                                            class="fas fa-star {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                            </i>
                                            @endfor
                                    </div>
                                    <span class="text-gray-500 text-sm">({{ $reviewCount }} Reviews) </span>
                                </div>
                                {{-- <div class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                    {{ $product->category->name ?? 'General' }}
                                </div> --}}
                            </div>

                            <!-- Product Name -->
                            <a href="{{ route('products.show', $product->slug) }}" class="block">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 hover:underline transition-colors line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <!-- Product Description -->
                            <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <!-- Price and Stock -->
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-2xl font-bold text-blue-600">
                                        ${{ number_format($price, 2) }}
                                    </span>
                                </div>
                                <div
                                    class="flex items-center {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} text-sm font-semibold">
                                    <i
                                        class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </div>
                            </div>

                            <!-- Quick Actions -->
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


                    @else
                    <div class="text-center py-20">
                        <div class="mx-auto h-32 w-32 text-gray-300 mb-6">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800">Your wishlist is empty</h2>
                        <p class="text-gray-600 mt-2">Browse our products and add your favorites here.</p>
                        <a href="{{ route('products.index') }}"
                            class="mt-6 inline-block px-6 py-3 bg-orange-600 text-white font-medium rounded-lg hover:bg-orange-700 transition">
                            Browse Products
                        </a>
                    </div>
                    @endif

            </div>

    </section>



</x-custom-layout>