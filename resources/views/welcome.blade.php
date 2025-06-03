<x-custom-layout>

    <!-- hero section -->
    <section id="hero-slider" class="relative h-screen pt-20  md:pt-auto overflow-hidden">
        <div class="swiper hero-swiper h-full">
            <div class="swiper-wrapper">

                <div class="swiper-slide slide-bg-1">
                    <div class="flex items-center justify-center h-full relative px-4 sm:px-6 lg:px-8">
                        <div
                            class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-center lg:text-left">
                            <div class="py-8 lg:py-0" data-aos="fade-right" data-aos-once="true">
                                <h1
                                    class="text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                                    Discover Our Latest <span class="text-yellow-400">Electronics</span> Collection
                                </h1>
                                <p
                                    class="text-xl text-gray-200 mb-8 leading-relaxed max-w-lg lg:max-w-none mx-auto lg:mx-0">
                                    Explore cutting-edge technology with our premium selection of smartphones, laptops,
                                    and smart devices. Experience innovation at its finest.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                    <a href="{{ route('products.index') }}"
                                        class="inline-flex items-center justify-center bg-yellow-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-yellow-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-shopping-bag mr-2"></i>Shop Now
                                    </a>
                                    {{-- <a href="#demo-video"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-play mr-2"></i>Watch Demo
                                    </a> --}}
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="{{  asset('images/Latest Smartphone.webp') }}"
                                        alt="Latest Smartphone - iPhone 15 Pro"
                                        class="w-full max-w-md mx-auto rounded-3xl shadow-2xl ring-4 ring-yellow-400 ring-offset-2 ring-offset-transparent">
                                </div>
                                <span
                                    class="absolute -top-4 md:-top-10 -right-4 md:-right-10 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-bold text-sm uppercase shadow-md animate-bounce-once">
                                    NEW ARRIVAL
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-bg-2">
                    <div class="flex items-center justify-center h-full relative px-4 sm:px-6 lg:px-8">
                        <div
                            class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-center lg:text-left">
                            <div class="py-8 lg:py-0" data-aos="fade-right" data-aos-once="true">
                                <h1
                                    class="text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                                    The Gaming <span class="text-cyan-400">Revolution</span> Starts Here
                                </h1>
                                <p
                                    class="text-xl text-gray-200 mb-8 leading-relaxed max-w-lg lg:max-w-none mx-auto lg:mx-0">
                                    Unleash your full potential with our high-performance gaming laptops and
                                    accessories. Built for serious gamers, by gamers.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                    <a href="{{ route('products.index')}}?q=gaming"
                                        class="inline-flex items-center justify-center bg-cyan-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-cyan-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-gamepad mr-2"></i>Explore Gaming
                                    </a>
                                    {{-- <a href="#specs-guide"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-chart-line mr-2"></i>View Specs
                                    </a> --}}
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="{{ asset('images/gaming-devices.webp') }}"
                                        alt="High-Performance Gaming Laptop"
                                        class="w-full max-w-md mx-auto rounded-3xl shadow-2xl ring-4 ring-cyan-400 ring-offset-2 ring-offset-transparent">
                                </div>
                                <span
                                    class="absolute -top-4 md:-top-10 -right-4 md:-right-10 bg-red-500 text-white px-4 py-2 rounded-full font-bold text-sm uppercase shadow-md animate-bounce-once">
                                    50% OFF
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-bg-3">
                    <div class="flex items-center justify-center h-full relative px-4 sm:px-6 lg:px-8">
                        <div
                            class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-center lg:text-left">
                            <div class="py-8 lg:py-0" data-aos="fade-right" data-aos-once="true">
                                <h1
                                    class="text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                                    Seamless Smart <span class="text-green-400">Home</span> Solutions
                                </h1>
                                <p
                                    class="text-xl text-gray-200 mb-8 leading-relaxed max-w-lg lg:max-w-none mx-auto lg:mx-0">
                                    Transform your living space with intelligent devices that make life easier, safer,
                                    and more connected than ever before.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                    <a href="{{ route('products.index').'?q=home'}}"
                                        class="inline-flex items-center justify-center bg-green-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-green-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-home mr-2"></i>Smart Home Collection
                                    </a>
                                    {{-- <a href="#smart-home-guide"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-info-circle mr-2"></i>Learn More
                                    </a> --}}
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="{{ asset('images/smart-home-devices.webp') }}"
                                        alt="Intelligent Smart Home Device"
                                        class="w-full max-w-md mx-auto rounded-3xl shadow-2xl ring-4 ring-green-400 ring-offset-2 ring-offset-transparent">
                                </div>
                                <span
                                    class="absolute -top-4 md:-top-10 -right-4 md:-right-10 bg-green-500 text-white px-4 py-2 rounded-full font-bold text-sm uppercase shadow-md animate-bounce-once">
                                    TRENDING NOW
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next text-white hover:text-yellow-400 transition-colors"></div>
            <div class="swiper-button-prev text-white hover:text-yellow-400 transition-colors"></div>

            <div class="swiper-pagination text-white"></div>
        </div>

        <div class="absolute bottom-6 md:bottom-10 left-1/2 transform -translate-x-1/2 flex flex-wrap justify-center gap-4 sm:gap-8 text-center w-full max-w-lg px-4"
            data-aos="fade-up" data-aos-delay="900" data-aos-once="true">
            <div class="glass-effect rounded-xl px-4 py-3 sm:px-6 sm:py-4 flex-1 min-w-[120px]">
                <div class="text-xl sm:text-2xl font-bold text-white">10K+</div>
                <div class="text-xs sm:text-sm text-gray-200">Happy Customers</div>
            </div>
            <div class="glass-effect rounded-xl px-4 py-3 sm:px-6 sm:py-4 flex-1 min-w-[120px]">
                <div class="text-xl sm:text-2xl font-bold text-white">500+</div>
                <div class="text-xs sm:text-sm text-gray-200">Products Available</div>
            </div>
            <div class="glass-effect rounded-xl px-4 py-3 sm:px-6 sm:py-4 flex-1 min-w-[120px]">
                <div class="text-xl sm:text-2xl font-bold text-white">24/7</div>
                <div class="text-xs sm:text-sm text-gray-200">Customer Support</div>
            </div>
        </div>
    </section>



    <!-- Popular Products Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-gradient-to-r from-purple-100 to-pink-100 px-4 py-2 rounded-full text-purple-700 font-medium mb-4">
                    <i class="fas fa-fire mr-2"></i>
                    Trending Now
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Popular Products</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover our most loved electronics that are flying
                    off the shelves</p>
            </div>

            <!-- Product Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('products.index') }}"
                    class="filter-btn active bg-gradient-to-r from-orange-600 to-pink-600 text-white px-6 py-3 rounded-full font-semibold transition-all hover-scale"
                    data-filter="all">
                    <i class="fas fa-th-large mr-2"></i>All Products
                </a>

                @foreach ($categories as $category)
                <a href="{{ route('products.index') }}?category={{ $category->slug }}"
                    class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 transition-all hover-scale">
                    <i class="fas fa-mobile-alt mr-2"></i>{{ Str::limit($category->name,10) }}
                </a>
                @endforeach
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 transition-all duration-500"
                id="products-grid">
                @foreach ($products as $index => $product)
                @php
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));
                $imageUrl = Storage::exists($product->image_path) ? Storage::url($product->image_path) :
                $product->image_path;
                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                    $delay = 200 + ($index * 50);
                    $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100) :
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
                                <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                                    class="w-full h-64 object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy">
                            </a>

                            <!-- Discount Badge -->
                            @if($hasSale)
                            <div class="absolute top-4 left-4 z-10">
                                <div
                                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg">
                                    <i class="fas fa-percent mr-1"></i>
                                    {{ $discount }}% OFF
                                </div>
                            </div>
                            @endif

                            <!-- Hot Badge for Popular Items -->
                            @if($product->is_featured || $index < 3) <div
                                class="absolute top-4 left-4 z-10 {{ $hasSale ? 'top-16' : 'top-4' }}">
                                <div
                                    class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-2 rounded-full text-xs font-bold shadow-lg animate-pulse">
                                    🔥 HOT
                                </div>
                        </div>
                        @endif

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
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="1000">
            <a href="{{ route('products.index') }}"
                class="bg-gradient-to-r from-orange-600 to-pink-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-orange-700 hover:to-pink-700 transition-all hover-scale pulse-glow">
                <i class="fas fa-th-large mr-2"></i>View All Products
            </a>
        </div>
        </div>
    </section>




    <!-- Categories Section -->
    <section class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore top product categories to find what you need
                    faster</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ($categories as $index => $category)
                @php
                $imageUrl = Storage::exists($category->image_path)
                ? Storage::url($category->image_path)
                : $category->image_path;

                // Stagger animation delay (e.g., 100ms increments)
                $delay = $index * 100;
                @endphp

                <a href="{{ route('products.index', ['category' => $category]) }}"
                    class="category-card group flex flex-col items-center bg-gray-50 rounded-3xl p-4 hover:shadow-lg transition-shadow"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">

                    <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                        <img src="{{ $imageUrl }}" alt="{{ $category->name }}"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-orange-600">
                        {{ $category->name }}
                    </h3>
                </a>
                @endforeach
            </div>


            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="1000">
                <a href="{{ route('categories.index') }}"
                    class="bg-gradient-to-r from-orange-600 to-pink-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-orange-700 hover:to-pink-700 transition-all hover-scale pulse-glow">
                    <i class="fas fa-th-large mr-2"></i>View All Categories
                </a>
            </div>


        </div>
    </section>



    <!-- Top Product Brands Section -->
    <section class="py-20 bg-gray-50" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Top Product Brands</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Shop from trusted brands across all categories</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8 items-center">
                @foreach ($brands as $index => $brand)
                @php
                $delay = $index * 100;
                @endphp

                <a href="{{ route('products.index', ['brands[]' => $brand->id]) }}"
                    class="flex flex-col items-center bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div
                        class="w-24 h-24 mb-3 overflow-hidden rounded-full bg-gray-100 flex items-center justify-center">
                        <img src="{{ Storage::url($brand->image_path)  }}" alt="{{ $brand->name }}"
                            class="object-contain w-full h-full transition-transform group-hover:scale-105">
                    </div>
                    <span class="text-sm font-medium text-gray-700">{{ $brand->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>






    <!-- Features Section -->
    <section class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Kamarona?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Experience the difference with our premium service
                    and cutting-edge technology solutions</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 rounded-2xl hover:shadow-xl transition-all hover-scale" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Free Shipping</h3>
                    <p class="text-gray-600">Free delivery on orders over $100. Fast and secure shipping worldwide.</p>
                </div>

                <div class="text-center p-6 rounded-2xl hover:shadow-xl transition-all hover-scale" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Warranty</h3>
                    <p class="text-gray-600">Extended warranty on all products with 24/7 customer support.</p>
                </div>

                <div class="text-center p-6 rounded-2xl hover:shadow-xl transition-all hover-scale" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-medal text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Quality</h3>
                    <p class="text-gray-600">Premium quality products from trusted brands and manufacturers.</p>
                </div>

                <div class="text-center p-6 rounded-2xl hover:shadow-xl transition-all hover-scale" data-aos="fade-up"
                    data-aos-delay="400">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Support</h3>
                    <p class="text-gray-600">24/7 technical support and customer service for all your needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-blue-900 relative overflow-hidden" data-aos="fade-up">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">Stay in the Loop</h2>
                <p class="text-xl text-gray-200 mb-8">Get exclusive deals, latest product launches, and tech news
                    delivered to your inbox</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-md mx-auto">
                    <div class="relative flex-1 w-full">
                        <input type="email" placeholder="Enter your email address"
                            class="w-full px-6 py-4 rounded-full text-gray-900 bg-white/90 backdrop-blur-sm border-0 focus:ring-4 focus:ring-purple-300 focus:outline-none text-lg">
                        <i
                            class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <button
                        class="bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:from-yellow-500 hover:to-orange-600 transition-all hover-scale pulse-glow whitespace-nowrap">
                        <i class="fas fa-paper-plane mr-2"></i>Subscribe
                    </button>
                </div>

                <p class="text-sm text-gray-300 mt-4">No spam, unsubscribe anytime. We respect your privacy.</p>
            </div>
        </div>

        <!-- Floating elements -->
        <div class="absolute top-10 left-10 opacity-20">
            <i class="fas fa-bolt text-6xl text-yellow-400 floating-animation"></i>
        </div>
        <div class="absolute bottom-10 right-10 opacity-20">
            <i class="fas fa-star text-4xl text-white floating-animation" style="animation-delay: -2s;"></i>
        </div>
    </section>


</x-custom-layout>