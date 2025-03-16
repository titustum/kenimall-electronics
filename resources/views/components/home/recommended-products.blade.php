@props(['products'=>[]])

<!-- Recommended Products Category Section -->
<section id="recommended-products" class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-6" x-data="{ 
        quickViewModal: false, 
        product: null,
        openModal(productData) {
            this.product = productData;
            this.quickViewModal = true;
        }
    }">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
            @foreach ($products as $product)
            <div class="group relative rounded-xl flex flex-col justify-items-start shadow-md bg-white overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
                
                <!-- Sale Badge (if applicable) -->
                @if ($product->discount > 0)
                <div class="absolute top-3 left-3 z-10 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ $product->discount }}% off
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
                            class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            Quick View
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Quick View Modal -->
        <div x-show="quickViewModal"  
        @click.self="quickViewModal = false"
        x-cloak class="fixed inset-0 bg-[rgba(0,0,0,0.8)] z-50 flex justify-center items-center p-6"
        >
            <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
                <button @click="quickViewModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>

                <!-- Product Details -->
                <div class="flex flex-col md:flex-row" x-show="product !== null">
                    <!-- Product Image -->
                    <div class="w-full md:w-1/3">
                        <img :src="product ? product.image_url : ''" :alt="product ? product.name : ''" class="w-full h-auto object-contain">
                    </div>
                    <!-- Product Info -->
                    <div class="w-full md:w-2/3 md:pl-6 mt-4 md:mt-0">
                        <h3 class="text-xl font-semibold text-gray-800" x-text="product ? product.name : ''"></h3>
                        <p class="text-gray-500 mt-2" x-text="product && product.description ? product.description : ''"></p>
                        
                        <!-- Rating Stars -->
                        <div class="flex items-center my-3">
                            <div class="flex text-amber-400">
                                <template x-for="i in 5">
                                    <span>
                                        <i x-show="product && i <= Math.floor(product.rating)" class="fas fa-star"></i>
                                        <i x-show="product && i > Math.floor(product.rating) && i - 0.5 <= product.rating" class="fas fa-star-half-alt"></i>
                                        <i x-show="product && i > product.rating" class="far fa-star"></i>
                                    </span>
                                </template>
                            </div>
                            <span class="text-xs text-gray-500 ml-2" x-text="product ? `(${product.reviews_count} reviews)` : ''"></span>
                        </div>
                        
                        <!-- Price -->
                        <div>
                            <span x-show="product && product.original_price" class="text-sm text-gray-500 line-through mr-2" 
                                  x-text="product && product.original_price ? `$${Number(product.original_price).toFixed(2)}` : ''"></span>
                            <span class="text-xl font-bold text-gray-800" 
                                  x-text="product ? `$${Number(product.price).toFixed(2)}` : ''"></span>
                        </div>

                        <!-- Product Specs -->
                        <div class="mt-4 text-gray-700">
                            <p><strong>Brand:</strong> <span x-text="product ? product.brand : ''"></span></p>
                            <p><strong>Model:</strong> <span x-text="product && product.model ? product.model : ''"></span></p>
                            <p><strong>Processor:</strong> <span x-text="product ? product.processor : ''"></span></p>
                            <p><strong>RAM:</strong> <span x-text="product ? product.ram : ''"></span></p>
                            <p><strong>Storage:</strong> <span x-text="product ? product.storage : ''"></span></p>
                        </div>

                        <div class="flex mt-6 space-x-4">
                            <a href="#"
                               class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200 shadow-sm">
                                Add to Cart
                            </a>
                            <a href="#"
                               class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="#"
                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                View All Products
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>