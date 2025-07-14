<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenimall - Premium Electronics Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Google Font: Righteous -->
    <link
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">


    {{-- In your layout head --}}
    @stack('meta') {{-- For additional meta tags --}}
    @stack('styles') {{-- For additional CSS --}}


    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-swiper .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5);
            opacity: 1;
        }

        .hero-swiper .swiper-pagination-bullet-active {
            background: #fff;
            transform: scale(1.2);
        }

        .hero-swiper .swiper-button-next,
        .hero-swiper .swiper-button-prev {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            backdrop-filter: blur(10px);
        }

        .hero-swiper .swiper-button-next:after,
        .hero-swiper .swiper-button-prev:after {
            font-size: 20px;
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.4);
            }

            50% {
                box-shadow: 0 0 40px rgba(102, 126, 234, 0.8);
            }
        }

        .slide-bg-1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .slide-bg-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .slide-bg-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* Sidebar specific styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            /* Adjust width as needed */
            height: 100%;
            background-color: white;
            /* Updated: Solid white background */
            z-index: 1000;
            /* Ensure sidebar is on top */
            transform: translateX(-100%);
            /* Start off-screen */
            transition: transform 0.3s ease-in-out;
            padding-top: 4rem;
            /* Space for the top bar content */
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            /* Enable scrolling for long sidebar content */
        }

        .sidebar.open {
            transform: translateX(0%);
            /* Slide in */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            /* Below sidebar, above content */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Hide scrollbar on body when sidebar is open to prevent content shifting */
        body.no-scroll {
            overflow: hidden;
        }

        /* Dropdown specific styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border-radius: 0.5rem;
            overflow: hidden;
            top: 100%;
            /* Position below the parent link */
            left: 50%;
            /* Center dropdown under the parent */
            transform: translateX(-50%);
            padding: 0.5rem 0;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: #333;
            padding: 0.75rem 1rem;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
            color: #00BCD4;
            /* Cyan on hover */
        }

        /* Sidebar dropdown/accordion styles */
        .sidebar-dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0.5rem 0;
            color: #333;
            font-size: 1.25rem;
            /* text-xl */
            font-weight: 500;
            /* font-medium */
            transition: color 0.2s ease;
            cursor: pointer;
        }

        .sidebar-dropdown-toggle:hover {
            color: #00BCD4;
            /* Cyan on hover */
        }

        .sidebar-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            padding-left: 1rem;
        }

        .sidebar-submenu.open {
            max-height: 500px;
            /* Adjust based on content to show all items */
            transition: max-height 0.5s ease-in;
        }

        .sidebar-submenu a {
            display: block;
            padding: 0.5rem 0;
            color: #555;
            font-size: 1rem;
            /* text-base */
            transition: color 0.2s ease;
        }

        .sidebar-submenu a:hover {
            color: #00BCD4;
            /* Cyan on hover */
        }
    </style>

    <style>
        .logo-container {
            font-family: 'Righteous', cursive;
        }

        .tagline {
            font-family: 'Inter', sans-serif;
        }

        .lightning-glow {
            filter: drop-shadow(0 0 8px rgba(249, 115, 22, 0.4));
        }

        .brand-glow {
            text-shadow: 0 0 20px rgba(249, 115, 22, 0.1);
        }

        .logo-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-link:hover {
            transform: translateY(-1px);
        }

        .logo-link:hover .lightning-bolt {
            animation: pulse-glow 1.5s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                filter: drop-shadow(0 0 8px rgba(249, 115, 22, 0.4));
            }

            50% {
                filter: drop-shadow(0 0 16px rgba(249, 115, 22, 0.8));
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .search-container {
            position: relative;
            overflow: hidden;
        }

        .search-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(249, 115, 22, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .search-container:focus-within::before {
            transform: translateX(100%);
        }

        .nav-dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .cart-bounce {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {

            0%,
            20%,
            60%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            80% {
                transform: translateY(-5px);
            }
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            max-width: 320px;
            height: 100vh;
            background: white;
            transition: left 0.3s ease-in-out;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 60;
            overflow-y: auto;
        }

        .mobile-menu.open {
            left: 0;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            z-index: 55;
        }

        .mobile-overlay.open {
            opacity: 1;
            visibility: visible;
            min-height: 100vh;
        }

        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }

        .navbar-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Tailwind plugin or custom CSS */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-sans bg-gray-50">



    <!-- Enhanced Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/95 backdrop-blur-sm navbar-shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 md:py-3">
            <div class="flex justify-between items-center h-16">

                <!-- Enhanced Logo -->
                <a href="{{ route('home') }}" class="logo-link inline-block group"
                    aria-label="Kenimall - Quality Electronics Home">
                    <div class="logo-container grid gap-1">
                        <div class="flex items-center">
                            <div class="relative mr-2">
                                <i
                                    class="fas fa-bolt text-2xl md:text-3xl text-orange-500 lightning-bolt lightning-glow transition-all duration-300"></i>
                                <div
                                    class="absolute inset-0 bg-orange-500 rounded-full opacity-10 scale-150 group-hover:scale-200 transition-transform duration-500">
                                </div>
                            </div>
                            <span
                                class="text-xl md:text-2xl lg:text-3xl font-bold gradient-text brand-glow tracking-wide">
                                Kenimall
                            </span>
                        </div>
                        <div
                            class="tagline text-xs md:text-sm font-medium text-teal-600 ml-8 md:ml-12 opacity-90 group-hover:opacity-100 transition-opacity duration-300 hidden sm:block">
                            Premium Quality Electronics
                        </div>
                    </div>
                </a>

                <!-- Enhanced Search Bar -->
                <div class="flex-1 mx-4 hidden md:flex max-w-2xl lg:max-w-4xl">
                    <form action="{{ route('products.index') }}" method="GET" class="search-container relative w-full"
                        autocomplete="off">
                        <div class="flex w-full">
                            <div class="relative flex-1">
                                <input type="text" name="q" placeholder="Search for products, brands, categories..."
                                    class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-l-lg   focus:ring-1 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white"
                                    id="search-input" aria-label="Search products, brands, categories"
                                    autocomplete="off" />
                            </div>
                            <button type="submit"
                                class="px-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-r-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl"
                                aria-label="Search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <!-- Search suggestions -->
                        <div id="search-suggestions"
                            class="absolute top-full left-0 right-0 bg-white shadow-lg rounded-b-lg border border-t-0 border-gray-200 hidden z-10">
                            <div class="p-2">
                                <div class="text-xs text-gray-500 mb-2">Popular searches</div>
                                <div class="space-y-1">
                                    <a href="{{ route('products.index', ['q' => 'iphone 15']) }}"
                                        class="block px-3 py-2 text-sm hover:bg-gray-50 rounded">iPhone 15</a>
                                    <a href="{{ route('products.index', ['q' => 'macbook pro']) }}"
                                        class="block px-3 py-2 text-sm hover:bg-gray-50 rounded">MacBook Pro</a>
                                    <a href="{{ route('products.index', ['q' => 'gaming laptop']) }}"
                                        class="block px-3 py-2 text-sm hover:bg-gray-50 rounded">Gaming Laptop</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>




                <!-- Navigation & Icons -->
                <div class="flex items-center space-x-2 md:space-x-4">

                    <!-- Enhanced Dropdown Menus -->
                    <div class="hidden lg:flex space-x-3">

                        <!-- All Products -->
                        <a href="{{ route('products.index') }}"
                            class="flex items-center text-gray-700 hover:text-orange-500 font-medium py-2 px-3 rounded-lg hover:bg-orange-50 transition-all duration-300">
                            All Products
                        </a>

                        <!-- Categories Dropdown -->
                        <div class="relative group">
                            <button
                                class="flex items-center text-gray-700 hover:text-orange-500 font-medium py-2 px-3 rounded-lg hover:bg-orange-50 transition-all duration-300">
                                Categories
                                <i
                                    class="fas fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                            </button>
                            <div
                                class="nav-dropdown absolute left-0 bg-white shadow-xl mt-2 rounded-xl border border-gray-100 w-64 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                                <div class="p-4">
                                    <div class="space-y-1">

                                        @foreach ($categories as $category)
                                        <a href="{{ route('products.index', ['category' => $category]) }}"
                                            class="flex items-center px-4 py-3 hover:bg-orange-50 rounded-lg transition-colors group/item">
                                            <i class="fas fa-tag text-orange-500 w-5 mr-3"></i>
                                            <div>
                                                <div class="font-medium text-gray-900 group-hover/item:text-orange-600">
                                                    {{ $category->name }}
                                                </div>

                                            </div>
                                        </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Enhanced Action Icons -->
                    <div class="flex items-center space-x-2">

                        <!-- Wishlist -->
                        <a href="{{ route('wishlist.index')  }}"
                            class="hidden sm:block text-gray-700 hover:text-red-500 p-2 rounded-lg hover:bg-red-50 transition-all duration-300 relative">
                            <i class="fas fa-heart text-lg"></i>
                            <span id="wishlist_count"
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                                {{ count(session('wishlist', [])) }}
                            </span>
                        </a>

                        <!-- Enhanced Cart -->
                        <a href="{{ route('cart.index') }}"
                            class="text-gray-700 hover:text-orange-500 p-2 rounded-lg hover:bg-orange-50 transition-all duration-300 relative group"
                            onclick="this.classList.add('cart-bounce'); setTimeout(() => this.classList.remove('cart-bounce'), 600)">
                            <i class="fas fa-shopping-cart text-lg group-hover:scale-110 transition-transform"></i>
                            <span id="cart-count"
                                class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium shadow-lg">{{
                                count(session('cart', [])) }}</span>
                        </a>

                        <!-- Track order -->
                        <a href="{{ route('orders.track-form') }}"
                            class="text-gray-700 hover:text-blue-500 p-2 rounded-lg hover:bg-blue-50 transition-all duration-300">
                            <i class="fas fa-shipping-fast text-lg"></i>
                        </a>

                        <!-- Enhanced Mobile Menu Button -->
                        <button id="mobile-menu-button"
                            class="lg:hidden text-gray-700 hover:text-orange-500 p-2 rounded-lg hover:bg-orange-50 transition-all duration-300"
                            onclick="toggleMobileMenu()">
                            <i class="fas fa-bars text-lg" id="menu-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div id="mobile-overlay" class="mobile-overlay" onclick="toggleMobileMenu()"></div>

        <!-- Enhanced Slide-in Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden">
            <div class="p-6">
                <!-- Mobile Menu Header -->
                <a href="{{ route('home') }}"
                    class="flex items-center justify-between mb-8 border-b border-gray-100 pb-4">
                    <div class="flex items-center">
                        <i class="fas fa-bolt text-orange-500 text-xl mr-2"></i>
                        <span class="font-bold text-gray-900 text-lg">Kenimall</span>
                    </div>
                    <button onclick="toggleMobileMenu()" class="text-gray-500 hover:text-gray-700 p-2">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </a>

                <!-- Mobile Search -->
                <div class="mb-6">
                    <form action="{{ route('products.index') }}" method="GET" class="flex w-full">
                        <input type="text" name="q" placeholder="Search products..."
                            class="flex-grow w-1/2 px-4 py-3 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm"
                            aria-label="Search products" autocomplete="off" />
                        <button type="submit"
                            class="px-4 shrink-0 bg-orange-500 text-white rounded-r-lg hover:bg-orange-600 transition-colors"
                            aria-label="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>


                <!-- Quick Actions -->
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <a href="{{ route('wishlist.index') }}"
                        class="flex items-center justify-center py-3 px-4 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-colors">
                        <i class="fas fa-heart mr-2"></i>
                        <span class="text-sm font-medium">Wishlist</span>
                    </a>
                    <a href="{{ route('orders.track-form') }}"
                        class="flex items-center justify-center py-3 px-4 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                        <i class="fas fa-shipping-fast mr-2"></i>
                        <span class="text-sm font-medium">Orders</span>
                    </a>
                </div>

                <!-- Mobile Navigation Links -->
                <div class="space-y-1">

                    <a href="{{ route('products.index') }}"
                        class="flex items-center py-3 px-3 text-gray-700 font-medium hover:bg-gray-50 rounded-lg transition-all">
                        <i class="fas fa-box-open text-lg mr-3"></i>
                        All Products
                    </a>


                    <!-- Categories Section -->
                    <div class="border-b border-gray-100 pb-4 mb-4">
                        <div class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-th-large text-orange-500 mr-2"></i>
                            Categories
                        </div>
                        <div class="space-y-1 ml-6">
                            @foreach ($categories as $category)
                            <a href="{{ route('products.index', ['category' => $category]) }}"
                                class="flex items-center py-2 px-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-all">
                                <i class="fas fa-tag text-orange-500 mr-3"></i>
                                {{ $category->name }}
                            </a>
                            @endforeach

                        </div>
                    </div>

                    <!-- Special Links -->
                    <a href="{{ route('products.index') }}?q=deals"
                        class="flex items-center py-3 px-3 text-red-600 font-medium hover:bg-red-50 rounded-lg transition-all">
                        <i class="fas fa-fire mr-3"></i>
                        Special Deals
                    </a>

                    <a href="#"
                        class="flex items-center py-3 px-3 text-gray-700 font-medium hover:bg-gray-50 rounded-lg transition-all">
                        <i class="fas fa-headset mr-3"></i>
                        Customer Support
                    </a>
                </div>

                <!-- Mobile Menu Footer -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="text-center">
                        <div class="text-sm text-gray-500 mb-2">Premium Quality Electronics</div>
                        <div class="flex justify-center space-x-4 text-gray-400">
                            <i class="fab fa-facebook hover:text-blue-500 cursor-pointer transition-colors"></i>
                            <i class="fab fa-twitter hover:text-blue-400 cursor-pointer transition-colors"></i>
                            <i class="fab fa-instagram hover:text-pink-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>





    {{ $slot }}



    <!-- Footer with collapsible sections -->
    <section class="bg-gray-900 text-white">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                    <!-- Brand Info (Always Expanded) -->
                    <div class="lg:col-span-2" data-aos="fade-up">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-4"><i class="fas fa-bolt text-yellow-400 mr-2"></i>Kenimall
                            </h2>
                            <p class="text-sm text-gray-300 mb-4">
                                Your trusted partner for premium electronics. We bring you the latest tech with
                                unmatched quality.
                            </p>

                            <!-- Social Icons -->
                            <div class="flex space-x-3">
                                <a href="#" class="p-2 bg-gray-800 rounded-full hover:bg-purple-600"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="p-2 bg-gray-800 rounded-full hover:bg-blue-500"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="p-2 bg-gray-800 rounded-full hover:bg-pink-500"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="p-2 bg-gray-800 rounded-full hover:bg-red-600"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Quick Links -->
                    <div data-aos="fade-up" data-aos-delay="100">
                        <details class="lg:open group">
                            <summary
                                class="text-lg font-semibold cursor-pointer text-white flex justify-between items-center lg:pointer-events-none">
                                Quick Links <span class="lg:hidden text-yellow-400">&#x25BC;</span>
                            </summary>
                            <ul class="mt-4 space-y-2 text-sm text-gray-300 group-open:block hidden lg:block">
                                <li><a href="#" class="hover:text-yellow-400">Home</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Products</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Categories</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Deals</a></li>
                                <li><a href="#" class="hover:text-yellow-400">About Us</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Contact</a></li>
                            </ul>
                        </details>
                    </div>

                    <!-- Collapsible Categories -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <details class="lg:open group">
                            <summary
                                class="text-lg font-semibold cursor-pointer text-white flex justify-between items-center lg:pointer-events-none">
                                Categories <span class="lg:hidden text-yellow-400">&#x25BC;</span>
                            </summary>
                            <ul class="mt-4 space-y-2 text-sm text-gray-300 group-open:block hidden lg:block">
                                <li><a href="#" class="hover:text-yellow-400">Smartphones</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Laptops</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Audio</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Gaming</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Smart Home</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Cameras</a></li>
                            </ul>
                        </details>
                    </div>

                    <!-- Collapsible Support -->
                    <div data-aos="fade-up" data-aos-delay="300">
                        <details class="lg:open group">
                            <summary
                                class="text-lg font-semibold cursor-pointer text-white flex justify-between items-center lg:pointer-events-none">
                                Support <span class="lg:hidden text-yellow-400">&#x25BC;</span>
                            </summary>
                            <ul class="mt-4 space-y-2 text-sm text-gray-300 group-open:block hidden lg:block">
                                <li><a href="#" class="hover:text-yellow-400">Help Center</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Shipping Info</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Returns</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Warranty</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Terms</a></li>
                                <li><a href="#" class="hover:text-yellow-400">Privacy</a></li>
                            </ul>
                        </details>
                    </div>
                </div>

                <!-- Contact Info -->
                <div
                    class="mt-10 pt-6 border-t border-gray-700 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-300">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-purple-500 mr-3"></i>
                        <div>
                            <div class="font-semibold text-white">Visit Us</div>
                            123 Tech Street, Melbourne, Australia
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-green-500 mr-3"></i>
                        <div>
                            <div class="font-semibold text-white">Call Us</div>
                            +61 421 778 978
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-blue-400 mr-3"></i>
                        <div>
                            <div class="font-semibold text-white">Email Us</div>
                            contact@kenimall.com
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 py-5">
            <div
                class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-400">
                <p>© 2025 Kenimall. All rights reserved.</p>
                <div class="flex gap-3 mt-2 sm:mt-0">
                    <i class="fab fa-cc-visa text-blue-500 text-lg"></i>
                    <i class="fab fa-cc-mastercard text-red-600 text-lg"></i>
                    <i class="fab fa-cc-paypal text-blue-400 text-lg"></i>
                    <i class="fab fa-cc-apple-pay text-white text-lg"></i>
                </div>
            </div>
        </div>
    </section>


    <div id="toast-container" class="fixed bottom-4 right-4 space-y-2 z-50"></div>



    <script>
        const searchInput = document.getElementById('search-input');
                    const suggestionsBox = document.getElementById('search-suggestions');

                    // Show suggestions on focus
                    searchInput.addEventListener('focus', () => {
                        suggestionsBox.classList.remove('hidden');
                    });

                    // Hide suggestions on blur, with slight delay to allow clicks
                    searchInput.addEventListener('blur', () => {
                        setTimeout(() => {
                        suggestionsBox.classList.add('hidden');
                        }, 200);
                    });

                    // Optional: Hide suggestions if input is empty
                    searchInput.addEventListener('input', () => {
                        if (searchInput.value.trim() === '') {
                        suggestionsBox.classList.remove('hidden');
                        } else {
                        suggestionsBox.classList.add('hidden');
                        }
                    });
    </script>

    <script>
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

            toast.className = `${bgColor} text-white px-4 py-2 rounded shadow-lg animate-fade-in`;
            toast.textContent = message;

            const container = document.getElementById('toast-container');
            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500); // Remove after fade-out
            }, 3000);
        }
    </script>


    <script>
        function quickAddToCart(productId) {
        fetch("{{ route('cart.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) { 
                showToast(data.message || 'Product added to cart', 'success'); 
                document.getElementById('cart-count').textContent = data.cart_count; 

            } else {
                showToast(data.message || 'Something went wrong', 'error');  
            }
        })
        .catch(err => {
            console.error(err);
            showToast(data.message || 'Error adding product to cart.', 'error'); 
        });
    }
    </script>

    <script>
        function quickBuyNow(productId) {
            fetch("{{ route('cart.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Optional toast
                    showToast(data.message || 'Product added to cart', 'success');

                    // Redirect to cart
                    window.location.href = "{{ route('cart.index') }}";
                } else {
                    showToast(data.message || 'Something went wrong', 'error');
                }
            })
            .catch(err => {
                console.error(err);
                showToast('Error adding product to cart.', 'error');
            });
        }
    </script>



    <script>
        function toggleWishlist(productId) {
            fetch("{{ route('wishlist.toggle') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(res => res.json())
            .then(data => {
                showToast(data.message || 'Wishlist updated', 'success');
                document.getElementById('wishlist_count').textContent = data.wishlist_count;
            })
            .catch(err => {
                console.error(err);
                showToast('Failed to update wishlist', 'error');
            });

        }
    </script>


    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            once: true,
        });

        // Initialize Swiper
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function () {
                    // Animate elements in the first slide on init
                    const activeSlide = this.slides[this.activeIndex];
                    AOS.refreshHard(); // Re-calculate all AOS elements' positions
                },
                slideChangeTransitionEnd: function () {
                    AOS.refreshHard(); // Trigger AOS animations when slide changes
                },
            },
        });
 
    </script>



    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-overlay');
            const icon = document.getElementById('menu-icon');
            const body = document.body;
            
            menu.classList.toggle('open');
            overlay.classList.toggle('open');
            
            if (menu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
                body.style.overflow = 'hidden'; // Prevent body scroll when menu is open
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                body.style.overflow = ''; // Restore body scroll
            }
        }

        // Enhanced dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.group');
            
            dropdowns.forEach(dropdown => {
                const button = dropdown.querySelector('button');
                const menu = dropdown.querySelector('.nav-dropdown');
                
                if (button && menu) {
                    let hoverTimeout;
                    
                    dropdown.addEventListener('mouseenter', () => {
                        clearTimeout(hoverTimeout);
                        menu.classList.add('show');
                    });
                    
                    dropdown.addEventListener('mouseleave', () => {
                        hoverTimeout = setTimeout(() => {
                            menu.classList.remove('show');
                        }, 100);
                    });
                }
            });
        });
    </script>

    {{-- Stack for additional scripts from child views --}}
    @stack('scripts')

</body>

</html>