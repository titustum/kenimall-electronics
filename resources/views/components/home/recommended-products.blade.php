@props(['products'=>[]])

<!-- Recommended Products Category Section -->
<section id="recommended-products" class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-6">
        <!-- Section Header with Enhanced Styling -->
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-2">
                Recommended for You
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Find Your Perfect Match
            </h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Explore personalized recommendations tailored to your needs. Whether for work, entertainment, or everyday use, we've got something for everyone.
            </p>
        </div>

        <!-- Products Grid with Enhanced Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="group relative rounded-xl flex flex-col justify-items-start shadow-md bg-white overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
                
                <!-- Sale Badge (if applicable) -->
                @if ($product->discount > 0)
                <div class="absolute top-3 left-3 z-10 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ round($product->discount) }}% off
                </div>
                @endif

                <!-- Wishlist Button -->
                <button class="absolute top-3 right-3 z-10 bg-white p-2 rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors duration-200 focus:outline-none">
                    <i class="fas fa-heart"></i>
                </button>

                <!-- Product Image with Hover Effect -->
                <a href="#" class="block h-48 md:h-56 overflow-hidden bg-white p-4">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                        class="w-full h-32 lg:h-48 object-contain transform transition-transform duration-500 group-hover:scale-110">
                </a>

                <!-- Product Info with Better Layout -->
                <div class="p-5 flex flex-grow flex-col">
                    <!-- Brand Name -->
                    <p class="text-xs font-medium text-blue-600 mb-1">{{ $product->brand }}</p>

                    <!-- Product Name -->
                    <a href="#"
                        class="block text-base md:text-lg font-bold text-gray-800 hover:text-blue-600 transition-colors mb-2 line-clamp-2"
                        title="{{ $product->name }}">
                        {{ $product->name }}
                    </a>

                    <!-- Brief Specs -->
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                        {{ $product->processor }} • {{ $product->ram }} RAM • {{ $product->storage }}
                    </p>

                    <!-- Rating Stars -->
                    <div class="flex items-center mb-3">
                        <div class="flex text-amber-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($product->rating))
                                    <i class="fas fa-star"></i>
                                @elseif ($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-xs text-gray-500 ml-2">({{ $product->reviews_count }} reviews)</span>
                    </div>

                    <!-- Price Section with Old Price -->
                    <div class="flex items-center space-x-2 mb-4">
                        @if ($product->original_price)
                        <p class="text-sm text-gray-500 line-through">${{ number_format($product->original_price, 2) }}</p>
                        @endif
                        <p class="text-xl font-bold text-gray-800">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex space-x-2 mt-auto">
                        <a href="#"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm text-center transition-colors duration-200 shadow-sm">
                            Add to Cart <i class="far fa-shopping-cart ml-2"></i>
                        </a>
                        <!-- Quick View Button - Fixed implementation -->
                        <button 
                            @click="openModal({{ json_encode($product) }})"
                            class="bg-blue-50 hidden md:block hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            Quick View
                        </button>
                        <a  href="{{ route('products.show', $product->id) }}"
                            class="bg-blue-50 block md:hidden hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


</section>