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

    <div class="max-w-7xl mx-auto px-4 py-8 mt-20">
        {{-- Breadcrumb Navigation --}}
        <nav class="mb-8 hidden lg:block" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ route('home') }}" class="hover:text-orange-600 transition">Home</a></li>
                <li><span class="mx-2">/</span></li>
                @if($product->category)
                <li><a href="#" class="hover:text-orange-600 transition">{{ $product->category->name }}</a></li>
                <li><span class="mx-2">/</span></li>
                @endif
                <li class="text-gray-900 font-medium hidden lg:inline" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        {{-- Product Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16" data-aos="fade-up">
            {{-- Product Images --}}
            <div class="space-y-4">
                @php
                $imageUrl = Storage::exists($product->image_path) ? Storage::url($product->image_path) :
                $product->image_path;
                $additionalImages = $product->additional_images ? json_decode($product->additional_images, true) : [];
                @endphp

                <div class="relative">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                        class="w-full h-96 lg:h-[500px] object-contain rounded-xl shadow-lg bg-white"
                        id="main-product-image" />

                    {{-- Image Zoom Indicator --}}
                    {{-- <div
                        class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-sm">
                        <i class="fas fa-search-plus mr-1"></i>Click to zoom
                    </div> --}}

                    {{-- Stock Badge --}}
                    <div class="absolute top-4 left-4">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>
                </div>

                {{-- Additional Images Thumbnail Gallery --}}
                @if(count($additionalImages) > 0)
                <div class="flex space-x-2 overflow-x-auto pb-2">
                    <button class="flex-shrink-0 w-16 h-16 rounded-lg border-2 border-orange-600 overflow-hidden"
                        onclick="changeMainImage('{{ $imageUrl }}')">
                        <img src="{{ $imageUrl }}" alt="Main view" class="w-full h-full object-contain">
                    </button>
                    @foreach($additionalImages as $index => $image)
                    <button
                        class="flex-shrink-0 w-16 h-16 rounded-lg border-2 border-gray-200 hover:border-orange-600 overflow-hidden transition"
                        onclick="changeMainImage('{{ Storage::url($image) }}')">
                        <img src="{{ Storage::url($image) }}" alt="View {{ $index + 2 }}"
                            class="w-full h-full object-contain">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Product Details --}}
            <div class="space-y-6">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>

                    @if ($product->model)
                    <p class="text-gray-600 mb-2">Model: <span class="font-medium">{{ $product->model }}</span></p>
                    @endif

                    @if ($product->brand)
                    <p class="text-gray-600">Brand: <span class="font-medium">{{ $product->brand->name }}</span></p>
                    @endif
                </div>

                {{-- Pricing --}}
                <div class="border-t border-b border-gray-200 py-4">
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-green-600">
                            ${{ number_format($product->sale_price ?? $product->price, 2) }}
                        </span>

                        @if ($product->sale_price)
                        <div class="flex items-center space-x-2">
                            <span class="text-xl text-gray-400 line-through">
                                ${{ number_format($product->price, 2) }}
                            </span>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-semibold">
                                Save {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                            </span>
                        </div>
                        @endif
                    </div>

                    @if($product->stock > 0 && $product->stock <= 10) <p class="text-orange-600 text-sm mt-2">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Only {{ $product->stock }} left in stock!
                        </p>
                        @endif
                </div>

                {{-- Description --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                {{-- Key Features --}}
                @if ($product->features)
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Key Features</h3>
                    <ul class="space-y-2">
                        @foreach (json_decode($product->features, true) as $feature)
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Action Buttons --}}
                <div class="space-y-4">
                    @if($product->stock > 0)
                    <div class="flex space-x-3">
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 transition"
                                onclick="decreaseQuantity()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                class="w-16 text-center border-0 focus:ring-0 focus:outline-none">
                            <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 transition"
                                onclick="increaseQuantity()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <button onclick="quickAddToCart({{ $product->id }})"
                            class="flex-1 bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 transition font-medium">
                            <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                        </button>
                    </div>

                    <div class="flex space-x-3">
                        <button onclick="quickBuyNow({{ $product->id }})"
                            class="flex-1 bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition font-medium">
                            <i class="fas fa-bolt mr-2"></i>Buy Now
                        </button>

                        <button onclick="toggleWishlist({{ $product->id }})"
                            class="px-6 py-3 border border-orange-600 text-orange-600 rounded-lg hover:bg-orange-50 transition font-medium">
                            <i class="fas fa-heart mr-2"></i>Wishlist
                        </button>
                    </div>
                    @else
                    <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 text-center">
                        <p class="text-gray-600 font-medium">This product is currently out of stock</p>
                        <button class="mt-2 text-orange-600 hover:text-orange-700 transition font-medium">
                            Notify when available
                        </button>
                    </div>
                    @endif
                </div>

                {{-- Additional Info --}}
                <div class="bg-gray-50 rounded-lg p-4 space-y-2 text-sm">
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
        <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Technical Specifications</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach (json_decode($product->specifications, true) as $spec => $value)
                        <div class="flex justify-between py-2 border-b border-gray-100 last:border-b-0">
                            <span class="font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $spec)) }}:</span>
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
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900">You might also like</h2>
                <a href="{{ route('products.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">
                    View all products <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php $delay = 100; @endphp

                @foreach ($relatedProducts as $related)
                @php
                $relImage = Storage::exists($related->image_path) ? Storage::url($related->image_path) :
                $related->image_path;
                $relPrice = $related->sale_price ?? $related->price;
                $delay += 50;
                @endphp

                <div data-aos="fade-up" data-aos-delay="{{ $delay }}"
                    class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group border border-gray-100">
                    <a href="{{ route('products.show', $related->slug) }}" class="block">
                        <div class="relative overflow-hidden">
                            <img src="{{ $relImage }}" alt="{{ $related->name }}"
                                class="w-full h-48 object-contain p-4 transition-transform duration-300 group-hover:scale-105">

                            @if($related->sale_price)
                            <div
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-bold">
                                SALE
                            </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <h3
                                class="font-semibold text-gray-800 mb-2 line-clamp-2 group-hover:text-orange-600 transition">
                                {{ $related->name }}
                            </h3>

                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-lg font-bold text-orange-600">${{ number_format($relPrice, 2)
                                        }}</span>
                                    @if($related->sale_price)
                                    <span class="text-sm text-gray-400 line-through ml-2">${{
                                        number_format($related->price, 2) }}</span>
                                    @endif
                                </div>

                                @if($related->stock > 0)
                                <button onclick="quickAddToCart({{ $related->id }}, event)"
                                    class="opacity-0 group-hover:opacity-100 transition-opacity bg-orange-600 text-white p-2 rounded-lg hover:bg-orange-700">
                                    <i class="fas fa-plus text-sm"></i>
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
</x-custom-layout>