<x-custom-layout>


    <x-home.hero-section />
    <x-home.shop-by-categories-section :categories="$categories" />



    <section class="py-12 bg-blue-50">
        <div class="container mx-auto px-4 md:px-6">
            <!-- Header with improved spacing and responsive design -->
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">Top Selling Items</h3>
                <a href="#" class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    View All
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Responsive grid with better spacing -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 md:gap-4">

                @foreach ($products as $product)
                <div @click="openModal({{ json_encode($product) }})"
                    class="group bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden cursor-pointer flex flex-col h-full border border-gray-100">


                    <!-- Product image with white background that matches product images -->
                    <div class="relative h-48 sm:h-56 w-full overflow-hidden bg-white border-b border-gray-100">
                        <img @if (str_starts_with($product->image_path, 'http'))
                        src="{{ $product->image_path }}"
                        @else
                        @if (file_exists(public_path('storage/'. $product->image_path)))
                        src="{{ asset('storage/'. $product->image_path) }}"
                        @else
                        src="{{ asset('images/placeholder-1.png') }}"
                        @endif
                        @endif
                        alt="{{ $product->name }}"
                        class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover:scale-105"
                        loading="lazy" />

                        <!-- Popular badge -->
                        <div class="absolute top-2 left-2">
                            <span class="bg-amber-500 text-white text-xs font-medium px-2 py-1 rounded">
                                Popular
                            </span>
                        </div>
                    </div>

                    <!-- Product info with better typography and spacing -->
                    <div class="flex flex-col flex-grow p-4">
                        <h2 class="font-semibold text-gray-800 mb-1 truncate">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm mb-1 truncate">{{ $product->category->name }}</p>

                        <!-- Star Rating System -->
                        <div class="flex text-amber-400 items-center mb-2">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->rating)
                                <i class="fas fa-star text-amber-400"></i>
                                @elseif ($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt text-amber-400"></i>
                                    @else
                                    <i class="far fa-star text-amber-400"></i>
                                    @endif
                                    @endfor
                                    <span class="text-xs text-gray-500 ml-1">({{ $product->reviews_count }})</span>
                        </div>

                        <!-- Sales count -->
                        <div class="flex items-center mb-2 text-xs text-gray-500">
                            <i class="fas fa-fire-alt text-red-500 mr-1"></i>
                            <span>{{ $product->sales_count }} sold this month</span>
                        </div>

                        <!-- Price with better alignment and color -->
                        <div class="mt-auto flex items-baseline">
                            <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2)
                                }}</span>
                            @if($product->price < $product->original_price)
                                <del class="ml-2 text-sm text-gray-500">${{ number_format($product->original_price, 2)
                                    }}</del>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>





    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <!-- Header with improved spacing and responsive design -->
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">New Arrivals</h3>
                <a href="#" class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    View All
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Responsive grid with better spacing -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-6">

                @foreach ($products as $product)
                <div
                    class="group bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden cursor-pointer flex flex-col h-full">

                    <!-- Product image with white background that matches product images -->
                    <a href="{{ route('products.show', $product->id) }}"
                        class="relative h-48 sm:h-56 w-full overflow-hidden bg-white border-b border-gray-100">
                        <img @if (str_starts_with($product->image_path, 'http'))
                        src="{{ $product->image_path }}"
                        @else
                        @if (file_exists(public_path('storage/'. $product->image_path)))
                        src="{{ asset('storage/'. $product->image_path) }}"
                        @else
                        src="{{ asset('images/placeholder-1.png') }}"
                        @endif
                        @endif
                        alt="{{ $product->name }}"
                        class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover:scale-105"
                        loading="lazy" />

                        <!-- Optional badges or sale tags -->
                        @if($product->price < $product->original_price)
                            <div class="absolute top-2 left-2">
                                <span class="bg-red-500 text-white text-xs font-medium px-2 py-1 rounded">
                                    SALE
                                </span>
                            </div>
                            @endif
                    </a>

                    <!-- Product info with better typography and spacing -->
                    <div class="flex flex-col flex-grow p-4">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="font-semibold text-gray-800 mb-1 truncate hover:underline">{{ $product->name
                            }}</a>
                        <a href="#" class="text-gray-500 text-sm mb-1 truncate hover:underline">{{
                            $product->category->name }}</a>

                        <!-- Star Rating System -->
                        <div class="flex text-amber-400 items-center mb-2">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->rating)
                                <i class="fas fa-star text-amber-400"></i>
                                @elseif ($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt text-amber-400"></i>
                                    @else
                                    <i class="far fa-star text-amber-400"></i>
                                    @endif
                                    @endfor
                                    <span class="text-xs text-gray-500 ml-1">({{ number_format($product->rating, 1)
                                        }})</span>
                        </div>

                        <!-- Price with better alignment and color -->
                        <div class="mt-auto flex items-baseline">
                            <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2)
                                }}</span>
                            @if($product->price < $product->original_price)
                                <del class="ml-2 text-sm text-gray-500">${{ number_format($product->original_price, 2)
                                    }}</del>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


    <x-home.product-quick-view-modal />

    <x-home.why-us-section />




</x-custom-layout>