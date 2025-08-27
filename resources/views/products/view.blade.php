<x-custom-layout>
    {{-- SEO Meta Tags --}}
    @push('meta')
    <meta name="description" content="{{ Str::limit($product->description, 160) }}">
    <meta name="keywords"
        content="{{ $product->name }}, {{ $product->model ?? '' }}, {{ $product->category->name ?? '' }}">
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ Str::limit($product->description, 160) }}">
    <meta property="og:image"
        content="{{ Storage::exists($product->image_path) ? Storage::url($product->image_path) : $product->image_path }}">
    <meta property="og:type" content="product">
    <meta property="product:price:amount" content="{{ $product->sale_price ?? $product->price }}">
    <meta property="product:price:currency" content="AUD">
    @endpush

    {{-- Structured Data for SEO --}}
    @push('scripts')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "{{ $product->name }}",
            "description": "{{ $product->description }}",
            "image": "{{ Storage::exists($product->image_path) ? Storage::url($product->image_path) : $product->image_path }}",
            "sku": "{{ $product->sku ?? $product->id }}",
            "brand": {
                "@type": "Brand",
                "name": "{{ $product->brand ?? config('app.name') }}"
            },
            "offers": {
                "@type": "Offer",
                "url": "{{ request()->url() }}",
                "priceCurrency": "AUD",
                "price": "{{ $product->sale_price ?? $product->price }}",
                "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
                "seller": {
                    "@type": "Organization",
                    "name": "{{ config('app.name') }}"
                }
            }
        }
    </script>
    @endpush




    @php

    $sampleComments = [
    "Absolutely love this :product! It’s one of the best in the :category category.",
    "After a week of using the :product, I can confidently say it's worth every penny.",
    "This :product exceeded expectations. Battery life and performance are top-notch.",
    "The :category range from this brand is always reliable. This one is no different.",
    "A must-have for anyone into :category tech. Solid build and user-friendly.",
    "Setup was quick, and the :product has been performing flawlessly ever since.",
    "If you're in the market for a good :category device, this is it!",
    "I use this :product daily now. Great investment.",
    "Looks premium and works smoothly. Great job!",
    "Can’t believe the features you get for the price. Would recommend the :product to friends."
    ];

    $reviewerNames = ['Alice', 'Bob', 'Charlie', 'Diana', 'Ethan', 'Fiona', 'George', 'Hannah', 'Isaac', 'Jenna'];

    $reviews = [];
    for ($i = 0; $i < 10; $i++) { $name=$reviewerNames[array_rand($reviewerNames)]; $rating=rand(3, 5);
        $template=$sampleComments[array_rand($sampleComments)]; $comment=Str::replace( [':product', ':category' ],
        [$product->name, strtolower($product->category->name ?? 'device')],
        $template
        );
        $date = now()->subDays(rand(1, 60))->toDateString();

        $reviews[] = [
        'name' => $name,
        'rating' => $rating,
        'comment' => $comment,
        'date' => $date,
        ];
        }

        $avgRating = collect($reviews)->avg('rating');
        $totalReviews = count($reviews);
        @endphp





        <div class="max-w-7xl mx-auto px-4 py-6 mt-20 lg:mt-28 text-sm">
            {{-- Breadcrumb Navigation --}}
            <nav class="mb-6 hidden lg:block" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-1 text-gray-500">
                    <li><a href="{{ route('home') }}" class="hover:text-orange-600 transition">Home</a></li>
                    <li><span class="mx-1">/</span></li>
                    @if($product->category)
                    <li><a href="#" class="hover:text-orange-600 transition">{{ $product->category->name }}</a></li>
                    <li><span class="mx-1">/</span></li>
                    @endif
                    <li class="text-gray-900 font-medium hidden lg:inline" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            {{-- Product Section --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12" data-aos="fade-up">
                {{-- Product Images --}}
                <div class="space-y-3">
                    @php
                    $additionalImages = $product->images ? json_decode($product->images, true) : [];
                    @endphp

                    <div class="relative">
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}"
                            class="w-full py-8 h-72 lg:h-[400px] object-contain rounded-lg shadow bg-white"
                            id="main-product-image" />

                        {{-- Stock Badge --}}
                        <div class="absolute top-3 left-3">
                            <span
                                class="px-2 py-0.5 rounded-full text-xs font-semibold {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>

                    {{-- Additional Images Thumbnail Gallery --}}
                    @if(count($additionalImages) > 0)
                    <div class="flex space-x-2 overflow-x-auto pb-2">
                        {{-- Main image thumbnail button --}}
                        <button class="flex-shrink-0 w-12 h-12 rounded-lg border-2 border-orange-600 overflow-hidden"
                            onclick="changeMainImage('{{ Storage::url($product->image_path) }}')">
                            <img src="{{ Storage::url($product->image_path) }}" alt="Main view"
                                class="w-full h-full object-contain">
                        </button>
                        @foreach($additionalImages as $index => $image)
                        <button
                            class="flex-shrink-0 w-12 h-12 rounded-lg border-2 border-gray-200 hover:border-orange-600 overflow-hidden transition"
                            onclick="changeMainImage('{{ Storage::url($image['image_path']) }}')">
                            <img src="{{ Storage::url($image['image_path']) }}" alt="View {{ $index + 2 }}"
                                class="w-full h-full object-contain">
                        </button>
                        @endforeach

                    </div>
                    @endif
                </div>

                {{-- Product Details --}}
                <div class="space-y-5">
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">{{ $product->name }}</h1>

                        @if ($product->model)
                        <p class="text-gray-600 mb-1 text-xs sm:text-sm">Model: <span class="font-medium">{{
                                $product->model
                                }}</span></p>
                        @endif

                        @if ($product->brand)
                        <p class="text-gray-600 text-xs sm:text-sm">Brand: <span class="font-medium">{{
                                $product->brand->name }}</span></p>
                        @endif
                    </div>

                    {{-- Rating: average rating and review count --}}
                    <div class="flex items-center mb-6">
                        <div class="text-2xl sm:text-3xl font-bold text-orange-600">{{ number_format($avgRating, 1) }}
                        </div>
                        <div class="ml-3 flex items-center">
                            @for ($i = 1; $i <= 5; $i++) @if($i <=floor($avgRating)) <i
                                class="fas fa-star text-orange-500">
                                </i>
                                @elseif($i - $avgRating < 1) <i class="fas fa-star-half-alt text-orange-500"></i>
                                    @else
                                    <i class="far fa-star text-orange-500"></i>
                                    @endif
                                    @endfor
                        </div>
                        <a href="#reviews" class="ml-3 text-gray-600 text-sm hover:underline focus:underline">({{
                            $totalReviews }} reviews)</a>
                    </div>

                    {{-- Pricing --}}
                    <div class="border-t border-b border-gray-200 py-3">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl font-bold text-green-600">
                                ${{ number_format($product->sale_price ?? $product->price, 2) }}
                            </span>

                            @if ($product->sale_price)
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-400 line-through">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                <span class="bg-red-100 text-red-800 px-2 py-0.5 rounded-full text-xs font-semibold">
                                    Save {{ round((($product->price - $product->sale_price) / $product->price) * 100)
                                    }}%
                                </span>
                            </div>
                            @endif
                        </div>

                        @if($product->stock > 0 && $product->stock <= 10) <p
                            class="text-orange-600 text-xs mt-1 flex items-center space-x-1">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Only {{ $product->stock }} left in stock!</span>
                            </p>
                            @endif
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Description</h3>
                        <p class="text-gray-700 leading-relaxed text-sm sm:text-base">{!! $product->description !!}</p>
                    </div>

                    {{-- Key Features --}}
                    @if ($product->features)
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Key Features</h3>
                        <ul class="space-y-1">
                            @foreach (json_decode($product->features, true) as $feature)
                            <li class="flex items-start space-x-2">
                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0 text-xs"></i>
                                <span class="text-gray-700 text-sm">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Action Buttons --}}
                    <div class="space-y-3">
                        @if($product->stock > 0)
                        <div class="flex space-x-2">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button type="button" class="px-2 py-1 text-gray-600 hover:text-gray-800 transition"
                                    onclick="decreaseQuantity()">
                                    <i class="fas fa-minus text-xs"></i>
                                </button>
                                <input type="number" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                    class="w-12 text-center border-0 focus:ring-0 focus:outline-none text-sm">
                                <button type="button" class="px-2 py-1 text-gray-600 hover:text-gray-800 transition"
                                    onclick="increaseQuantity()">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>

                            <button onclick="quickAddToCart({{ $product->id }})"
                                class="flex-1 bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition font-medium text-sm">
                                <i class="fas fa-shopping-cart mr-1"></i>Add to Cart
                            </button>
                        </div>

                        <div class="flex space-x-2">
                            <button onclick="quickBuyNow({{ $product->id }})"
                                class="flex-1 bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                                <i class="fas fa-bolt mr-1"></i>Buy Now
                            </button>

                            <button onclick="toggleWishlist({{ $product->id }})"
                                class="px-4 py-2 border border-orange-600 text-orange-600 rounded-lg hover:bg-orange-50 transition font-medium text-sm">
                                <i class="fas fa-heart mr-1"></i>Wishlist
                            </button>
                        </div>
                        @else
                        <div class="bg-gray-100 border border-gray-300 rounded-lg p-3 text-center text-sm">
                            <p class="text-gray-600 font-medium">This product is currently out of stock</p>
                            <button class="mt-1 text-orange-600 hover:text-orange-700 transition font-medium text-sm">
                                Notify when available
                            </button>
                        </div>
                        @endif
                    </div>

                    {{-- Additional Info --}}
                    <div class="bg-gray-50 rounded-lg p-3 space-y-1 text-xs sm:text-sm">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-truck text-green-600"></i>
                            <span>Free shipping on orders over $50</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-undo text-blue-600"></i>
                            <span>30-day return policy</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-orange-600"></i>
                            <span>1-year warranty included</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Specifications Tab --}}
            @if ($product->specifications)
            <div class="mb-12" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-5 py-3 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Technical Specifications</h3>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                            @foreach (json_decode($product->specifications, true) as $spec => $value)
                            <div class="flex justify-between py-1 border-b border-gray-100 last:border-b-0">
                                <span class="font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $spec))
                                    }}:</span>
                                <span class="text-gray-600">{{ $value }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Related Products --}}
            @if ($relatedProducts->count())
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900">You might also like</h2>
                    <a href="{{ route('products.index') }}"
                        class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        <span class="hidden md:inline">View all </span> Products
                        <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @php $delay = 100; @endphp

                    @foreach ($relatedProducts as $related)
                    @php
                    $relPrice = $related->sale_price ?? $related->price;
                    $delay += 50;
                    @endphp

                    <div data-aos="fade-up" data-aos-delay="{{ $delay }}"
                        class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group border border-gray-100">
                        <a href="{{ route('products.show', $related->slug) }}" class="block">
                            <div class="relative overflow-hidden">
                                <img src="{{ Storage::url($related->image_path) }}" alt="{{ $related->name }}"
                                    class="w-full h-36 object-contain p-3 transition-transform duration-300 group-hover:scale-105">

                                @if($related->sale_price)
                                <div
                                    class="absolute top-1 left-1 bg-red-500 text-white px-1.5 py-0.5 rounded text-xs font-bold">
                                    SALE
                                </div>
                                @endif
                            </div>

                            <div class="p-3">
                                <h3
                                    class="font-semibold text-gray-800 mb-1 line-clamp-2 group-hover:text-orange-600 transition text-sm">
                                    {{ $related->name }}
                                </h3>

                                <div class="flex items-center justify-between text-sm">
                                    <div>
                                        <span class="text-lg font-bold text-orange-600">${{ number_format($relPrice, 2)
                                            }}</span>
                                        @if($related->sale_price)
                                        <span class="text-xs text-gray-400 line-through ml-1">${{
                                            number_format($related->price, 2) }}</span>
                                        @endif
                                    </div>

                                    @if($related->stock > 0)
                                    <button onclick="quickAddToCart({{ $related->id }}, event)"
                                        class="opacity-0 group-hover:opacity-100 transition-opacity bg-orange-600 text-white p-1.5 rounded-lg hover:bg-orange-700">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif



            {{-- Customer Reviews Section --}}
            <div id="reviews" class="mt-10" data-aos="fade-up" data-aos-delay="150" x-data="{ showAll: false }">

                <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Reviews</h3>

                <div class="flex items-center mb-6">
                    <div class="text-2xl sm:text-3xl font-bold text-orange-600">{{ number_format($avgRating, 1) }}</div>
                    <div class="ml-3 flex items-center">
                        @for ($i = 1; $i <= 5; $i++) @if($i <=floor($avgRating)) <i class="fas fa-star text-orange-500">
                            </i>
                            @elseif($i - $avgRating < 1) <i class="fas fa-star-half-alt text-orange-500"></i>
                                @else
                                <i class="far fa-star text-orange-500"></i>
                                @endif
                                @endfor
                    </div>
                    <span class="ml-3 text-gray-600 text-sm">({{ $totalReviews }} reviews)</span>
                </div>

                <div class="space-y-6 max-w-3xl">
                    @foreach ($reviews as $index => $review)
                    <div class="border border-gray-200 rounded-lg p-4" x-show="showAll || {{ $index }} < 3"
                        x-transition>
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-semibold text-gray-800">{{ $review['name'] }}</div>
                            <div class="flex items-center text-orange-500">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$review['rating']) <i
                                    class="fas fa-star text-sm"></i>
                                    @else
                                    <i class="far fa-star text-sm"></i>
                                    @endif
                                    @endfor
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm mb-2">{{ $review['comment'] }}</p>
                        <div class="text-gray-400 text-xs">
                            {{ \Carbon\Carbon::parse($review['date'])->format('F j, Y') }}
                        </div>
                    </div>
                    @endforeach
                </div>

                @if (count($reviews) > 3)
                <div class="mt-4 text-center">
                    <button @click="showAll = !showAll" class="text-orange-600 font-medium hover:underline text-sm"
                        x-text="showAll ? 'Show Less' : 'View All Reviews'"></button>
                </div>
                @endif
            </div>


        </div>


        {{-- JavaScript for Enhanced Functionality --}}
        @push('scripts')
        <script>
            function changeMainImage(imageUrl) {
                document.getElementById('main-product-image').src = imageUrl;
            }

            function increaseQuantity() {
                const input = document.getElementById('quantity');
                const max = parseInt(input.getAttribute('max'));
                const current = parseInt(input.value);
                if (current < max) {
                    input.value = current + 1;
                }
            }

            function decreaseQuantity() {
                const input = document.getElementById('quantity');
                const current = parseInt(input.value);
                if (current > 1) {
                    input.value = current - 1;
                }
            }
        </script>
        @endpush

        {{-- add alpine js CDN Link --}}
        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js" defer></script>
        @endpush
</x-custom-layout>