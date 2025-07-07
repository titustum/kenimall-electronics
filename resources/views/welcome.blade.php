<x-custom-layout>


    <section id="hero-slider"
        class="relative min-h-screen pt-16 md:pt-24 overflow-hidden bg-gradient-to-b from-gray-900 to-black">

        <div class="swiper hero-swiper h-full">

            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <article class="swiper-slide slide-bg-1 flex items-center justify-center h-full px-4 sm:px-6 lg:px-12"
                    role="group" aria-label="Slide 1 - Electronics Collection">
                    <div
                        class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center text-center lg:text-left">

                        <!-- Text Content -->
                        <header class="py-6 lg:py-0" data-aos="fade-right" data-aos-once="true">
                            <h1
                                class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight drop-shadow-lg">
                                Discover Our Latest <span class="text-yellow-400">Electronics</span> Collection
                            </h1>
                            <p
                                class="text-sm sm:text-base md:text-lg text-gray-200 mb-6 max-w-md sm:max-w-lg md:max-w-none mx-auto lg:mx-0 leading-relaxed">
                                Explore cutting-edge technology with our premium selection of smartphones, laptops, and
                                smart devices. Experience innovation at its finest.
                            </p>
                            <nav class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start"
                                aria-label="Primary call to action">
                                <a href="{{ route('products.index') }}"
                                    class="inline-flex items-center justify-center bg-yellow-400 text-gray-900 px-6 py-3 sm:px-8 sm:py-4 rounded-full font-semibold text-sm sm:text-base hover:bg-yellow-300 transition-transform duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once"
                                    aria-label="Shop now for electronics">
                                    <i class="fas fa-shopping-bag mr-2 text-sm sm:text-base"></i>Shop Now
                                </a>
                            </nav>
                        </header>

                        <!-- Image Content -->
                        <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                            data-aos-once="true">
                            <div class="floating-animation max-w-[320px] sm:max-w-md">
                                <img src="{{ asset('images/Latest Smartphone.webp') }}"
                                    alt="Latest Smartphone - iPhone 15 Pro"
                                    class="w-full rounded-3xl shadow-2xl ring-4 ring-yellow-400 ring-offset-2 ring-offset-transparent"
                                    loading="lazy" decoding="async">
                            </div>
                            <span
                                class="absolute -top-3 md:-top-8 -right-3 md:-right-8 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full font-bold text-xs sm:text-sm uppercase shadow-md animate-bounce-once"
                                aria-label="New Arrival">
                                NEW ARRIVAL
                            </span>
                        </div>
                    </div>
                </article>

                <!-- Slide 2 -->
                <article class="swiper-slide slide-bg-2 flex items-center justify-center h-full px-4 sm:px-6 lg:px-12"
                    role="group" aria-label="Slide 2 - Gaming Revolution">
                    <div
                        class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center text-center lg:text-left">

                        <!-- Text Content -->
                        <header class="py-6 lg:py-0" data-aos="fade-right" data-aos-once="true">
                            <h1
                                class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight drop-shadow-lg">
                                The Gaming <span class="text-cyan-400">Revolution</span> Starts Here
                            </h1>
                            <p
                                class="text-sm sm:text-base md:text-lg text-gray-200 mb-6 max-w-md sm:max-w-lg md:max-w-none mx-auto lg:mx-0 leading-relaxed">
                                Unleash your full potential with our high-performance gaming laptops and accessories.
                                Built for serious gamers, by gamers.
                            </p>
                            <nav class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start"
                                aria-label="Primary call to action">
                                <a href="{{ route('products.index') }}?q=gaming"
                                    class="inline-flex items-center justify-center bg-cyan-400 text-gray-900 px-6 py-3 sm:px-8 sm:py-4 rounded-full font-semibold text-sm sm:text-base hover:bg-cyan-300 transition-transform duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once"
                                    aria-label="Explore gaming products">
                                    <i class="fas fa-gamepad mr-2 text-sm sm:text-base"></i>Explore Gaming
                                </a>
                            </nav>
                        </header>

                        <!-- Image Content -->
                        <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                            data-aos-once="true">
                            <div class="floating-animation max-w-[320px] sm:max-w-md">
                                <img src="{{ asset('images/gaming-devices.webp') }}"
                                    alt="High-Performance Gaming Laptop"
                                    class="w-full rounded-3xl shadow-2xl ring-4 ring-cyan-400 ring-offset-2 ring-offset-transparent"
                                    loading="lazy" decoding="async">
                            </div>
                            <span
                                class="absolute -top-3 md:-top-8 -right-3 md:-right-8 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-xs sm:text-sm uppercase shadow-md animate-bounce-once"
                                aria-label="50 percent off">
                                50% OFF
                            </span>
                        </div>
                    </div>
                </article>

            </div>

            <!-- Swiper Controls -->
            <button class="swiper-button-prev text-white hover:text-yellow-400 transition-colors"
                aria-label="Previous Slide"></button>
            <button class="swiper-button-next text-white hover:text-yellow-400 transition-colors"
                aria-label="Next Slide"></button>

            <div class="swiper-pagination text-white" aria-label="Pagination"></div>

        </div>

        <!-- Stats Section -->
        <div class="absolute bottom-6 md:bottom-10 left-1/2 transform -translate-x-1/2 flex flex-wrap justify-center gap-4 sm:gap-8 text-center w-full max-w-lg px-4"
            data-aos="fade-up" data-aos-delay="900" data-aos-once="true" role="region" aria-label="Customer statistics">
            <div class="glass-effect rounded-xl px-3 py-2 sm:px-5 sm:py-3 flex-1 min-w-[110px]">
                <div class="text-lg sm:text-xl font-bold text-white">10K+</div>
                <div class="text-xs sm:text-sm text-gray-200">Happy Customers</div>
            </div>
            <div class="glass-effect rounded-xl px-3 py-2 sm:px-5 sm:py-3 flex-1 min-w-[110px]">
                <div class="text-lg sm:text-xl font-bold text-white">500+</div>
                <div class="text-xs sm:text-sm text-gray-200">Products Available</div>
            </div>
            <div class="glass-effect rounded-xl px-3 py-2 sm:px-5 sm:py-3 flex-1 min-w-[110px]">
                <div class="text-lg sm:text-xl font-bold text-white">24/7</div>
                <div class="text-xs sm:text-sm text-gray-200">Customer Support</div>
            </div>
        </div>

    </section>


    <!-- Popular Products Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-gray-50 to-gray-100" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-10 sm:mb-16">
                <div
                    class="inline-flex items-center bg-gradient-to-r from-purple-100 to-pink-100 px-3 sm:px-4 py-1 sm:py-2 rounded-full text-purple-700 text-sm sm:text-base font-medium mb-3 sm:mb-4">
                    <i class="fas fa-fire mr-2"></i>
                    Trending Now
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-3 sm:mb-4">Popular
                    Products</h2>
                <p class="text-sm sm:text-base md:text-xl text-gray-600 max-w-2xl mx-auto">Discover our most loved
                    electronics that are flying off the shelves</p>
            </div>

            <!-- Filter Tabs (Scroll on mobile) -->
            <div class="flex overflow-x-auto sm:justify-center gap-3 sm:gap-4 mb-8 sm:mb-12 no-scrollbar px-2 sm:px-0"
                data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('products.index') }}"
                    class="filter-btn active bg-gradient-to-r from-orange-600 to-pink-600 text-white px-5 sm:px-6 py-2 sm:py-3 rounded-full text-sm sm:text-base font-semibold whitespace-nowrap transition-all hover:scale-105"
                    data-filter="all">
                    <i class="fas fa-th-large mr-2"></i>All Products
                </a>

                @foreach ($categories as $category)
                <a href="{{ route('products.index') }}?category={{ $category->slug }}"
                    class="filter-btn bg-white text-gray-700 px-5 sm:px-6 py-2 sm:py-3 rounded-full text-sm sm:text-base font-semibold border border-gray-200 hover:border-purple-300 whitespace-nowrap transition-all hover:scale-105">
                    <i class="fas fa-mobile-alt mr-2"></i>{{ Str::limit($category->name, 10) }}
                </a>
                @endforeach
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8"
                id="products-grid">
                @foreach ($products as $index => $product)
                @php
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));
                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                    $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100) :
                    0;
                    $rating = $product->average_rating ?? 4.5;
                    $reviewCount = $product->reviews_count ?? rand(50, 200);
                    $delay = 200 + ($index * 50);
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
                            <div class="absolute top-3 left-3 z-10">
                                <div
                                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-2 py-1 text-xs rounded-full font-bold shadow">
                                    <i class="fas fa-percent mr-1"></i>{{ $discount }}% OFF
                                </div>
                            </div>
                            @endif

                            <!-- HOT Badge -->
                            @if($product->is_featured || $index < 3) <div
                                class="absolute {{ $hasSale ? 'top-12' : 'top-3' }} left-3 z-10">
                                <div
                                    class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-2 py-1 text-xs rounded-full font-bold shadow animate-pulse">
                                    🔥 HOT
                                </div>
                        </div>
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
                            <span
                                class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold text-xs sm:text-sm">
                                <i
                                    class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-2 pt-2">
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

        <!-- View All -->
        <div class="text-center mt-10 sm:mt-12" data-aos="fade-up" data-aos-delay="1000">
            <a href="{{ route('products.index') }}"
                class="bg-gradient-to-r from-orange-600 to-pink-600 text-white px-8 sm:px-12 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-lg hover:from-orange-700 hover:to-pink-700 transition hover:scale-105 shadow">
                <i class="fas fa-th-large mr-2"></i>View All Products
            </a>
        </div>

        </div>
    </section>





    <!-- Categories Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-3 sm:mb-4">Shop by
                    Category</h2>
                <p class="text-sm sm:text-base md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Explore top product categories to find what you need faster
                </p>
            </div>

            <!-- Category Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8">
                @foreach ($categories as $index => $category)
                @php
                $delay = $index * 100;
                @endphp

                <a href="{{ route('products.index', ['category' => $category]) }}"
                    class="category-card group flex flex-col items-center bg-gray-50 rounded-2xl p-3 sm:p-4 hover:shadow-lg transition-shadow duration-300"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">

                    <!-- Image -->
                    <div class="w-full h-32 sm:h-40 mb-3 sm:mb-4 overflow-hidden rounded-xl bg-white">
                        <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }}"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                    </div>

                    <!-- Title -->
                    <h3
                        class="text-base sm:text-lg font-semibold text-gray-900 text-center group-hover:text-orange-600 transition-colors">
                        {{ $category->name }}
                    </h3>
                </a>
                @endforeach
            </div>

            <!-- View All -->
            <div class="text-center mt-10 sm:mt-12" data-aos="fade-up" data-aos-delay="1000">
                <a href="{{ route('categories.index') }}"
                    class="bg-gradient-to-r from-orange-600 to-pink-600 text-white px-8 sm:px-12 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-lg hover:from-orange-700 hover:to-pink-700 transition hover:scale-105 shadow">
                    <i class="fas fa-th-large mr-2"></i>View All Categories
                </a>
            </div>

        </div>
    </section>




    <!-- Top Product Brands Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-gray-50" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-3 sm:mb-4">
                    Top Product Brands
                </h2>
                <p class="text-sm sm:text-base md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Shop from trusted brands across all categories
                </p>
            </div>


            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3 items-center">
                @foreach ($brands as $index => $brand)
                @php
                $delay = $index * 100;
                @endphp

                <a href="{{ route('products.index', ['brands[]' => $brand->id]) }}"
                    class="flex flex-col items-center bg-white p-2 md:p-4 rounded-2xl shadow-sm hover:shadow-md transition"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class="w-16 md:w-24 h-16 md:h-24 md:mb-3 overflow-hidden flex items-center justify-center">
                        <img src="{{ Storage::url($brand->image_path)  }}" alt="{{ $brand->name }}"
                            class="object-contain w-full h-full transition-transform group-hover:scale-105">
                    </div>
                    <span class="text-sm hidden lg:inline font-medium text-gray-700">{{ $brand->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>





    <!-- Features Section -->
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Why Choose Kamarona?
                </h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                    Experience the difference with our premium service and cutting-edge technology solutions
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
                <!-- Feature Item -->
                <div class="text-center p-5 sm:p-6 rounded-2xl hover:shadow-xl transition-all hover:scale-105"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="bg-blue-100 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-shipping-fast text-xl sm:text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Free Shipping</h3>
                    <p class="text-sm text-gray-600">Free delivery on orders over $100. Fast and secure shipping
                        worldwide.</p>
                </div>

                <!-- Feature Item -->
                <div class="text-center p-5 sm:p-6 rounded-2xl hover:shadow-xl transition-all hover:scale-105"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="bg-green-100 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-shield-alt text-xl sm:text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Warranty</h3>
                    <p class="text-sm text-gray-600">Extended warranty on all products with 24/7 customer support.</p>
                </div>

                <!-- Feature Item -->
                <div class="text-center p-5 sm:p-6 rounded-2xl hover:shadow-xl transition-all hover:scale-105"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="bg-purple-100 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-medal text-xl sm:text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Quality</h3>
                    <p class="text-sm text-gray-600">Premium quality products from trusted brands and manufacturers.</p>
                </div>

                <!-- Feature Item -->
                <div class="text-center p-5 sm:p-6 rounded-2xl hover:shadow-xl transition-all hover:scale-105"
                    data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="bg-yellow-100 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-headset text-xl sm:text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Support</h3>
                    <p class="text-sm text-gray-600">24/7 technical support and customer service for all your needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-blue-900 relative overflow-hidden" data-aos="fade-up">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4">Stay in the Loop</h2>
                <p class="text-sm sm:text-base text-gray-200 mb-6">
                    Get exclusive deals, latest product launches, and tech news delivered to your inbox
                </p>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center max-w-md mx-auto">
                    <div class="relative flex-1 w-full">
                        <input type="email" placeholder="Enter your email"
                            class="w-full px-5 py-3 rounded-full text-sm sm:text-base text-gray-900 bg-white/90 backdrop-blur-sm border-0 focus:ring-4 focus:ring-purple-300 focus:outline-none">
                        <i
                            class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    </div>
                    <button
                        class="bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-base hover:from-yellow-500 hover:to-orange-600 transition-all hover:scale-105 whitespace-nowrap">
                        <i class="fas fa-paper-plane mr-2"></i>Subscribe
                    </button>
                </div>

                <p class="text-xs text-gray-300 mt-4">No spam, unsubscribe anytime. We respect your privacy.</p>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 opacity-20">
            <i class="fas fa-bolt text-4xl sm:text-6xl text-yellow-400 floating-animation"></i>
        </div>
        <div class="absolute bottom-10 right-10 opacity-20">
            <i class="fas fa-star text-2xl sm:text-4xl text-white floating-animation" style="animation-delay: -2s;"></i>
        </div>
    </section>


</x-custom-layout>