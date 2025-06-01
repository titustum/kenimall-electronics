<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamarona - Premium Electronics Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Google Font: Righteous -->
    <link
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">


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
</head>

<body class="bg-gray-50">

    <nav class="fixed top-0 w-full z-50 bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 md:py-3">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-gray-900 font-[Righteous]">
                        <i class="fas fa-bolt text-orange-500 mr-2"></i>KAMARONA
                    </div>
                </div>

                <!-- Search bar (centered) -->
                <form class="flex-1 mx-4 hidden md:flex max-w-4xl">
                    <input type="text" placeholder="Search for products..."
                        class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                    <button class="px-2 bg-orange-600 text-white rounded-r-lg">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- Nav + Icons -->
                <div class="flex items-center space-x-4">

                    <!-- Dropdown Menus -->
                    <div class="hidden md:flex space-x-6">

                        <!-- Products Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center text-gray-700 hover:text-cyan-500 font-medium">
                                Products <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                            <div class="absolute hidden group-hover:block bg-white shadow-md mt-2 rounded-md z-10">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Laptops</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Accessories</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Wearables</a>
                            </div>
                        </div>

                        <!-- Categories Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center text-gray-700 hover:text-cyan-500 font-medium">
                                Categories <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                            <div class="absolute hidden group-hover:block bg-white shadow-md mt-2 rounded-md z-10">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Gaming Gear</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Smart Home</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Audio & Video</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Photography</a>
                            </div>
                        </div>
                    </div>

                    <!-- Icons -->
                    <button class="text-gray-700 hover:text-cyan-500 relative">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <button class="text-gray-700 hover:text-cyan-500">
                        <i class="fas fa-user text-lg"></i>
                    </button>
                    <button id="mobile-menu-button" class="md:hidden text-gray-700">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>


    <div id="mobile-sidebar" class="sidebar">
        <div class="flex justify-between items-center p-4 border-b border-gray-100">
            <div class="text-2xl font-bold text-gray-900">
                <i class="fas fa-bolt text-cyan-500 mr-2"></i>Kamarona
            </div>
            <button id="close-sidebar-button" class="text-gray-700 text-xl hover:text-cyan-500">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="p-4">
            <input type="text" placeholder="Search products..."
                class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" />

            <a href="#" class="block py-2 font-medium text-lg text-gray-700 hover:text-cyan-500">Home</a>

            <div>
                <button class="sidebar-dropdown-toggle" data-target="products-submenu">
                    Products <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div id="products-submenu" class="sidebar-submenu">
                    <a href="#">Smartphones</a>
                    <a href="#">Laptops</a>
                    <a href="#">Accessories</a>
                    <a href="#">Wearables</a>
                </div>
            </div>

            <div>
                <button class="sidebar-dropdown-toggle" data-target="categories-submenu">
                    Categories <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div id="categories-submenu" class="sidebar-submenu">
                    <a href="#">Gaming Gear</a>
                    <a href="#">Smart Home</a>
                    <a href="#">Audio & Video</a>
                    <a href="#">Photography</a>
                </div>
            </div>


            <a href="#" class="block py-2 font-medium text-lg text-gray-700 hover:text-cyan-500">Cart</a>


            <div>
                <button class="sidebar-dropdown-toggle" data-target="account-submenu">
                    Account <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div id="account-submenu" class="sidebar-submenu">
                    <a href="#" class="block py-1 text-gray-700 hover:text-cyan-500">Profile</a>
                    <a href="#" class="block py-1 text-gray-700 hover:text-cyan-500">Orders</a>
                    <a href="#" class="block py-1 text-gray-700 hover:text-cyan-500">Register</a>
                    <a href="#" class="block py-1 text-gray-700 hover:text-cyan-500">Login</a>
                </div>
            </div>


        </div>
    </div>


    <div id="sidebar-overlay" class="overlay"></div>



    <!-- hero section -->
    <section id="hero-slider" class="relative h-screen pt-20 md:pt-auto overflow-hidden">
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
                                    <a href="#popular-products"
                                        class="inline-flex items-center justify-center bg-yellow-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-yellow-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-shopping-bag mr-2"></i>Shop Now
                                    </a>
                                    <a href="#demo-video"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-play mr-2"></i>Watch Demo
                                    </a>
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
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
                                    <a href="#gaming-products"
                                        class="inline-flex items-center justify-center bg-cyan-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-cyan-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-gamepad mr-2"></i>Explore Gaming
                                    </a>
                                    <a href="#specs-guide"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-chart-line mr-2"></i>View Specs
                                    </a>
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
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
                                    <a href="#smart-home-products"
                                        class="inline-flex items-center justify-center bg-green-400 text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-green-300 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg animate-pulse-once">
                                        <i class="fas fa-home mr-2"></i>Smart Home Collection
                                    </a>
                                    <a href="#smart-home-guide"
                                        class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-info-circle mr-2"></i>Learn More
                                    </a>
                                </div>
                            </div>
                            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left"
                                data-aos-once="true">
                                <div class="floating-animation">
                                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
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
                <button
                    class="filter-btn active bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full font-semibold transition-all hover-scale"
                    data-filter="all">
                    <i class="fas fa-th-large mr-2"></i>All Products
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 transition-all hover-scale"
                    data-filter="smartphones">
                    <i class="fas fa-mobile-alt mr-2"></i>Smartphones
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 transition-all hover-scale"
                    data-filter="laptops">
                    <i class="fas fa-laptop mr-2"></i>Laptops
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 transition-all hover-scale"
                    data-filter="accessories">
                    <i class="fas fa-headphones mr-2"></i>Accessories
                </button>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" id="products-grid">
                @foreach ($products as $index => $product)
                @php
                // Determine filter class (use category slug or name, sanitized)
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));

                // Image URL (check storage or fallback)
                $imageUrl = Storage::exists($product->image_path) ? Storage::url($product->image_path) :
                $product->image_path;

                // Pricing logic
                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;

                    // Animation delay increasing per product
                    $delay = 200 + ($index * 100);
                    @endphp

                    <div class="product-card {{ $filterClass }} bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover-scale group"
                        data-aos="fade-up" data-aos-delay="{{ $delay }}">
                        <div class="relative overflow-hidden">
                            <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-contain p-3 group-hover:scale-110 transition-transform duration-500">

                            @if($hasSale)
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    -{{ number_format((($product->price - $product->sale_price) / $product->price) *
                                    100) }}%
                                </span>
                            </div>
                            @endif

                            <div class="absolute top-4 right-4">
                                <button
                                    class="bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-all">
                                    <i class="fas fa-heart text-gray-600 hover:text-red-500"></i>
                                </button>
                            </div>

                            <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button
                                    class="bg-purple-600 text-white p-3 rounded-full hover:bg-purple-700 transition-all pulse-glow">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400 text-sm">
                                    @for ($i = 0; $i < 5; $i++) <i class="fas fa-star"></i>
                                        @endfor
                                </div>
                                <span class="text-gray-500 text-sm ml-2">(124 reviews)</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ Str::limit($product->name, 30) }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 60) }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-2xl font-bold text-purple-600">${{ number_format($price, 2)
                                        }}</span>
                                    @if ($hasSale)
                                    <span class="text-lg text-gray-400 line-through">${{ number_format($product->price,
                                        2) }}</span>
                                    @endif
                                </div>
                                <div
                                    class="flex items-center {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} text-sm font-medium">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="1000">
                <button
                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-purple-700 hover:to-pink-700 transition-all hover-scale pulse-glow">
                    <i class="fas fa-th-large mr-2"></i>View All Products
                </button>
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

                <a href="{{ route('products.index', ['category' => $category->id]) }}"
                    class="category-card group flex flex-col items-center bg-gray-50 rounded-3xl p-4 hover:shadow-lg transition-shadow"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">

                    <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                        <img src="{{ $imageUrl }}" alt="{{ $category->name }}"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-purple-600">
                        {{ $category->name }}
                    </h3>
                </a>
                @endforeach
            </div>


            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="1000">
                <button
                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-purple-700 hover:to-pink-700 transition-all hover-scale pulse-glow">
                    <i class="fas fa-th-large mr-2"></i>View All Categories
                </button>
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
    <section class="py-20 bg-gradient-to-r from-purple-900 via-blue-900 to-indigo-900 relative overflow-hidden"
        data-aos="fade-up">
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

    <!-- Footer Section -->
    <section class="bg-gray-900 text-white">
        <!-- Main Footer -->
        <div class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                    <!-- Brand Column -->
                    <div class="lg:col-span-2" data-aos="fade-up">
                        <div class="mb-6">
                            <div class="text-3xl font-bold text-white mb-4">
                                <i class="fas fa-bolt text-yellow-400 mr-2"></i>Kamarona
                            </div>
                            <p class="text-gray-300 text-lg leading-relaxed mb-6">
                                Your trusted partner for premium electronics. We bring you the latest technology with
                                unmatched quality and service.
                            </p>

                            <!-- Social Links -->
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="bg-gray-800 hover:bg-purple-600 p-3 rounded-full transition-all hover-scale">
                                    <i class="fab fa-facebook-f text-lg"></i>
                                </a>
                                <a href="#"
                                    class="bg-gray-800 hover:bg-blue-500 p-3 rounded-full transition-all hover-scale">
                                    <i class="fab fa-twitter text-lg"></i>
                                </a>
                                <a href="#"
                                    class="bg-gray-800 hover:bg-pink-600 p-3 rounded-full transition-all hover-scale">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                                <a href="#"
                                    class="bg-gray-800 hover:bg-red-600 p-3 rounded-full transition-all hover-scale">
                                    <i class="fab fa-youtube text-lg"></i>
                                </a>
                                <a href="#"
                                    class="bg-gray-800 hover:bg-blue-700 p-3 rounded-full transition-all hover-scale">
                                    <i class="fab fa-linkedin text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-xl font-semibold mb-6 text-white">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>Home</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>Products</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>Categories</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>Deals</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>About Us</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-chevron-right text-xs mr-2"></i>Contact</a></li>
                        </ul>
                    </div>

                    <!-- Product Categories -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-semibold mb-6 text-white">Categories</h3>
                        <ul class="space-y-3">
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-mobile-alt text-xs mr-2"></i>Smartphones</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-laptop text-xs mr-2"></i>Laptops</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-headphones text-xs mr-2"></i>Audio</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-gamepad text-xs mr-2"></i>Gaming</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-home text-xs mr-2"></i>Smart Home</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-camera text-xs mr-2"></i>Cameras</a></li>
                        </ul>
                    </div>

                    <!-- Customer Service -->
                    <div data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-xl font-semibold mb-6 text-white">Support</h3>
                        <ul class="space-y-3">
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-question-circle text-xs mr-2"></i>Help Center</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-truck text-xs mr-2"></i>Shipping Info</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-undo text-xs mr-2"></i>Returns</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-shield-alt text-xs mr-2"></i>Warranty</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-file-alt text-xs mr-2"></i>Terms</a></li>
                            <li><a href="#"
                                    class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center"><i
                                        class="fas fa-lock text-xs mr-2"></i>Privacy</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info Bar -->
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start" data-aos="fade-up"
                            data-aos-delay="400">
                            <div class="bg-purple-600 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Visit Our Store</h4>
                                <p class="text-gray-300 text-sm">123 Tech Street, Nairobi, Kenya</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center md:justify-start" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="bg-green-600 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Call Us</h4>
                                <p class="text-gray-300 text-sm">+254 700 123 456</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center md:justify-start" data-aos="fade-up"
                            data-aos-delay="600">
                            <div class="bg-blue-600 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Email Us</h4>
                                <p class="text-gray-300 text-sm">hello@kamarona.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-gray-300 text-sm">
                        © 2025 Kamarona Electronics. All rights reserved. Made with <i
                            class="fas fa-heart text-red-500 mx-1"></i> in Kenya
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="text-gray-300 text-sm">We Accept:</div>
                        <div class="flex space-x-3">
                            <div class="bg-white p-2 rounded">
                                <i class="fab fa-cc-visa text-blue-600 text-lg"></i>
                            </div>
                            <div class="bg-white p-2 rounded">
                                <i class="fab fa-cc-mastercard text-red-600 text-lg"></i>
                            </div>
                            <div class="bg-white p-2 rounded">
                                <i class="fab fa-cc-paypal text-blue-500 text-lg"></i>
                            </div>
                            <div class="bg-white p-2 rounded">
                                <i class="fab fa-cc-apple-pay text-gray-800 text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <button id="backToTop"
            class="fixed bottom-6 right-6 bg-gradient-to-r from-purple-600 to-pink-600 text-white p-4 rounded-full shadow-lg hover:from-purple-700 hover:to-pink-700 transition-all hover-scale opacity-0 invisible z-50">
            <i class="fas fa-chevron-up text-lg"></i>
        </button>
    </section>


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


        // Sidebar functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeSidebarButton = document.getElementById('close-sidebar-button');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const body = document.body;

        function openSidebar() {
            mobileSidebar.classList.add('open');
            sidebarOverlay.classList.add('active');
            body.classList.add('no-scroll'); // Prevent scrolling of main content
        }

        function closeSidebar() {
            mobileSidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
            body.classList.remove('no-scroll'); // Re-enable scrolling
        }

        mobileMenuButton.addEventListener('click', openSidebar);
        closeSidebarButton.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar); // Close sidebar when overlay is clicked

        // Sidebar dropdown/accordion functionality
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.dataset.target;
                const submenu = document.getElementById(targetId);

                // Close other open submenus
                document.querySelectorAll('.sidebar-submenu.open').forEach(openSubmenu => {
                    if (openSubmenu.id !== targetId) {
                        openSubmenu.classList.remove('open');
                        openSubmenu.previousElementSibling.querySelector('i').classList.remove('fa-chevron-up');
                        openSubmenu.previousElementSibling.querySelector('i').classList.add('fa-chevron-down');
                    }
                });

                // Toggle the clicked submenu
                submenu.classList.toggle('open');
                const icon = button.querySelector('i');
                if (submenu.classList.contains('open')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
    </script>
</body>

</html>