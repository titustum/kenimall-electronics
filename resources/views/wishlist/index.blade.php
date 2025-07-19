<x-custom-layout>


    <!-- Wished Products Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100 mt-20 md:mt-28" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16 px-4 sm:px-0">
                <div
                    class="inline-flex items-center bg-gradient-to-r from-purple-100 to-pink-100 px-4 py-2 rounded-full text-purple-700 font-medium mb-4">
                    <i class="fas fa-heart mr-2"></i>
                    Wishes
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Wished Products</h2>
                <p class="text-base sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    Find your favorite products at your disposal
                </p>
            </div>


            @if($products->count())

            <!-- Products Grid -->
            <div class="grid grid-cols-2 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8"
                id="products-grid">
                @foreach ($products as $index => $product)
                @php
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));
                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                    $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100)
                    :
                    0;
                    $rating = $product->average_rating ?? 4.5;
                    $reviewCount = $product->reviews_count ?? rand(50, 200);
                    $delay = 200 + ($index * 50);
                    @endphp

                    <div class="product-card {{ $filterClass }} bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition-all hover:scale-[1.02] duration-300 relative border border-gray-100"
                        data-aos="fade-up" data-aos-delay="{{ $delay }}" data-price="{{ $price }}"
                        data-name="{{ $product->name }}" data-created="{{ $product->created_at }}">

                        <!-- Image -->
                        <div class="relative overflow-hidden bg-white border-b border-gray-200">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 sm:h-48 md:h-56 object-contain p-3 transition-transform duration-300 group-hover:scale-105"
                                    loading="lazy" />
                            </a>
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
                                    {{ Str::limit($product->name, 20) }}
                                </h3>
                            </a>

                            <!-- Price -->
                            <div class="flex items-center justify-between text-sm">
                                <div>
                                    <span class="text-lg font-bold text-orange-600">
                                        ${{ number_format($product->sale_price ?? $product->price, 2) }}
                                    </span>
                                    @if($product->sale_price)
                                    <span class="text-xs text-gray-400 line-through ml-1">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                    @endif
                                </div>


                                @if($product->stock > 0)
                                <button onclick="quickAddToCart({{ $product->id }}, event)"
                                    class="opacity-0 group-hover:opacity-100 transition-opacity bg-orange-600 text-white p-1.5 rounded-lg hover:bg-orange-700">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
            </div>
            @else
            <div class="text-center mt-8">
                <p class="text-gray-500">No wished products found. Start adding some!</p>
            </div>
            @endif

    </section>



</x-custom-layout>