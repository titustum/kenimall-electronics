<x-layouts.custom>
    <div class="p-6 container mx-auto">
        <div class="bg-white max-w-6xl w-full p-6 relative">
            
            <!-- Product Details -->
            <div class="flex flex-col md:flex-row">
                <!-- Product Image -->
                <div class="w-full md:w-1/3">
                    <img src="{{ $product ? $product->image_path : '' }}" alt="{{ $product ? $product->name : '' }}" class="w-full h-auto object-contain">
                </div>
                <!-- Product Info -->
                <div class="w-full md:w-2/3 md:pl-6 mt-4 md:mt-0">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $product ? $product->name : '' }}</h3>
                    <p class="text-gray-500 mt-2">{{ $product && $product->description ? $product->description : 'No description available.' }}</p>
                    
                    <!-- Rating Stars -->
                    <div class="flex items-center my-3">
                        <div class="flex text-amber-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <span>
                                    @if ($product && $i <= floor($product->rating))
                                        <i class="fas fa-star"></i>
                                    @elseif ($product && $i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                </span>
                            @endfor
                        </div>
                        <span class="text-xs text-gray-500 ml-2">{{ $product ? "({$product->reviews_count} reviews)" : '' }}</span>
                    </div>
                    
                    <!-- Price -->
                    <div>
                        @if ($product && $product->original_price)
                            <span class="text-sm text-gray-500 line-through mr-2">{{ '$' . number_format($product->original_price, 2) }}</span>
                        @endif
                        <span class="text-xl font-bold text-gray-800">{{ $product ? '$' . number_format($product->price, 2) : '' }}</span>
                    </div>
    
                    <!-- Product Specs -->
                    <div class="mt-4 text-gray-700">
                        <p><strong>Brand:</strong> <span>{{ $product ? $product->brand : '' }}</span></p>
                        <p><strong>Model:</strong> <span>{{ $product && $product->model ? $product->model : '' }}</span></p>
                        <p><strong>Processor:</strong> <span>{{ $product ? $product->processor : '' }}</span></p>
                        <p><strong>RAM:</strong> <span>{{ $product ? $product->ram : '' }}</span></p>
                        <p><strong>Storage:</strong> <span>{{ $product ? $product->storage : '' }}</span></p>
                    </div>
    
                    <div class="flex mt-6 space-x-4">
                        <a href="#"
                           class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200 shadow-sm">
                           <i class="far fa-shopping-cart"></i> Add to Cart
                        </a>
                        <a href="#"
                           class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            <i class="far fa-heart"></i> Favorite
                        </a>
                    </div>
                </div>
            </div>

           

            <!-- Product Features -->
            <div class="mt-8">
                <h4 class="text-2xl font-semibold text-gray-800">Features</h4>
                <ul class="list-disc pl-6 mt-2 text-gray-700">
                    @if ($product->features)
                        @php
                            $features = json_decode($product->features, true); // Decode to an array
                        @endphp
                        
                        @if($features)
                            @foreach($features as $featureKey => $featureValue)
                                <li>{{ $featureKey }}: {{ $featureValue }}</li>
                            @endforeach
                        @endif
                    @endif
                    
                </ul>
            </div>

            <!-- Customer Reviews Section -->
            {{-- <div class="mt-8">
                <h4 class="text-2xl font-semibold text-gray-800">Customer Reviews</h4>
                @if($product && $product->reviews_count > 0)
                    <div class="space-y-4 mt-4">
                        @foreach($product->reviews as $review)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex items-center mb-2">
                                    <span class="font-semibold">{{ $review->user->name }}</span>
                                    <span class="ml-2 text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex text-amber-400">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span>
                                            @if ($i <= floor($review->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $review->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        </span>
                                    @endfor
                                </div>
                                <p class="text-gray-700 mt-2">{{ $review->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="mt-4 text-gray-500">No reviews yet. Be the first to leave a review!</p>
                @endif
            </div> --}}


          

             
        </div>
    </div>

    
    <x-home.footer-section />

</x-layouts.custom>
