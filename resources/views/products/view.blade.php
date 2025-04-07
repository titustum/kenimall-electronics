<x-layouts.custom>
    <div class="container mx-auto p-6">
        <div class="bg-white max-w-6xl mx-auto shadow-md rounded-lg overflow-hidden">

            <!-- Product Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                <!-- Product Image -->
                <div class="col-span-1">
                    <img src="{{ $product?->image_path ?? '' }}" alt="{{ $product?->name ?? '' }}"
                        class="w-full h-auto object-contain rounded-md shadow">
                </div>

                <!-- Product Info -->
                <div class="col-span-2 space-y-4">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $product?->name ?? '' }}</h1>
                    <p class="text-gray-600">{{ $product?->description ?? 'No description available.' }}</p>

                    <!-- Product Rating -->
                    <div class="flex items-center">
                        <div class="flex text-amber-400">
                            @for ($i = 1; $i <= 5; $i++) <span>
                                <i
                                    class="{{ $product && $i <= floor($product->rating) ? 'fas fa-star' : ($product && $i - 0.5 <= $product->rating ? 'fas fa-star-half-alt' : 'far fa-star') }}"></i>
                                </span>
                                @endfor
                        </div>
                        <span class="text-sm text-gray-500 ml-2">{{ $product? "({$product->reviews_count} reviews)" : ''
                            }}</span>
                    </div>

                    <!-- Product Pricing -->
                    <div class="flex items-center space-x-4">
                        @if ($product?->original_price)
                        <span class="text-gray-500 line-through">{{ '$' . number_format($product->original_price, 2)
                            }}</span>
                        @endif
                        <span class="text-xl font-bold text-blue-600">{{ $product? '$' . number_format($product->price,
                            2) : '' }}</span>
                    </div>

                    <!-- Product Specifications -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                        <p><strong>Brand:</strong> {{ $product?->brand->name ?? 'N/A' }}</p>
                        <p><strong>Model:</strong> {{ $product?->model ?? 'N/A' }}</p>
                        <p><strong>Processor:</strong> {{ $product?->processor ?? 'N/A' }}</p>
                        <p><strong>RAM:</strong> {{ $product?->ram ?? 'N/A' }}</p>
                        <p><strong>Storage:</strong> {{ $product?->storage ?? 'N/A' }}</p>
                        <p><strong>Color:</strong> {{ $product?->color ?? 'N/A' }}</p>
                    </div>

                    <!-- Call-to-Action Buttons -->
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        <a href="#" class="bg-blue-100 text-blue-800 py-2 px-4 rounded-lg hover:bg-blue-200 transition">
                            <i class="fas fa-heart"></i> Add to Favorites
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Features Section -->
            <div class="border-t p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Features</h2>
                <ul class="list-disc pl-5 text-gray-700">
                    @if ($product?->features)
                    @php
                    $features = json_decode($product->features, true);
                    @endphp
                    @foreach ($features ?? [] as $featureKey => $featureValue)
                    <li><strong>{{ $featureKey }}:</strong> {{ $featureValue }}</li>
                    @endforeach
                    @else
                    <li>No features available.</li>
                    @endif
                </ul>
            </div>

            <!-- Customer Reviews Section -->
            <div class="border-t p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Customer Reviews</h2>
                @if ($product?->reviews_count > 0)
                <div class="space-y-4">
                    @foreach ($product->reviews as $review)
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">{{ $review->user->name }}</span>
                            <span class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex text-amber-400">
                            @for ($i = 1; $i <= 5; $i++) <span>
                                <i
                                    class="{{ $i <= floor($review->rating) ? 'fas fa-star' : ($i - 0.5 <= $review->rating ? 'fas fa-star-half-alt' : 'far fa-star') }}"></i>
                                </span>
                                @endfor
                        </div>
                        <p class="text-gray-700 mt-2">{{ $review->comment }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500">No reviews available. Be the first to leave a review!</p>
                @endif
            </div>
        </div>
    </div>
    <x-home.footer-section />
</x-layouts.custom>