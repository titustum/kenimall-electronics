<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamarona Electronics Mall</title>

    <!-- Google Font: Righteous -->
    <link
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">


    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{  asset('assets/font-awesome-6-pro-main/css/all.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css">

    <style>
        .btn {
            border-width: 1px;
            cursor: pointer;
            font-weight: 600;
            justify-content: center;
            line-height: 1.5;
            text-align: center;
            -moz-user-select: none;
            user-select: none;
            vertical-align: middle;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1)
        }

        .btn-sm {
            font-size: .75rem;
            padding: .25rem .75rem
        }

        .btn-lg,
        .btn-sm {
            border-radius: .375rem
        }

        .btn-lg {
            font-size: 1.125rem;
            padding: .5rem 1.5rem
        }


        :root {
            --swiper-theme-color: #0aad0a;
            --swiper-pagination-color: #0aad0a;
            --swiper-pagination-bullet-opacity: 1
        }

        .swiper-pagination-bullet {
            background: transparent;
            border: 2px solid #0aad0a;
            border-radius: 50px;
            display: inline-block;
            height: 10px;
            opacity: .3;
            width: 10px
        }

        .swiper-pagination-bullet-active {
            background: var(--swiper-pagination-color, var(--swiper-theme-color));
            border-color: #0aad0a;
            opacity: var(--swiper-pagination-bullet-opacity, 1)
        }

        [data-navigation=false] .swiper-navigation {
            display: none;
            opacity: 0;
            visibility: hidden
        }

        .swiper-pagination-numbers {
            background: #efefef;
            border-radius: 50%;
            color: #000;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            margin: auto 2px;
            width: 28px
        }

        .swiper-pagination-numbers-active {
            background: #0aad0a;
            color: #fff;
            opacity: 1
        }

        .swiper-button-prev {
            background-color: #f0f3f2;
            border-radius: 50px;
            box-shadow: 0 2px 4px -1px rgba(145, 158, 171, .2), 0 4px 5px 0 rgba(145, 158, 171, .14), 0 1px 10px 0 rgba(145, 158, 171, .12);
            color: #21313c;
            height: 28px;
            left: 0;
            right: auto;
            width: 28px;

            &:after {
                content: "\ea60";
                font-family: tabler-icons;
                font-size: 14px
            }

            &:hover {
                background-color: #0aad0a;
                color: #fff
            }
        }

        .swiper-button-next {
            background-color: #f0f3f2;
            border-radius: 50px;
            box-shadow: 0 2px 4px -1px rgba(145, 158, 171, .2), 0 4px 5px 0 rgba(145, 158, 171, .14), 0 1px 10px 0 rgba(145, 158, 171, .12);
            color: #21313c;
            height: 28px;
            left: auto;
            right: 0;
            width: 28px;

            &:after {
                content: "\ea61";
                font-family: tabler-icons;
                font-size: 14px
            }

            &:hover {
                background-color: #0aad0a;
                color: #fff
            }
        }
    </style>


</head>

<body class="bg-gray-50 font-[Roboto]">

    <!-- Navbar Section -->
    <nav class="bg-white py-4 shadow-md">
        <!-- Top Div for Social Media and Contact Info -->
        <div class="w-full bg-blue-600 text-white">
            <div class="container mx-auto flex justify-between items-center px-6 py-2">
                <!-- Social Media Links (Left) -->
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
                </div>

                <!-- Contact Info (Right) -->
                <div class="flex space-x-6">
                    <span class="text-sm">
                        <i class="fal fa-phone-alt"></i>
                        <span class="hidden md:inline">(123) 456-7890</span>
                    </span>
                    <span class="text-sm">
                        <i class="fal fa-envelope"></i>
                        <span class="hidden md:inline">contact@kamarona.com</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Main Navbar Section -->
        <div class="container mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-800 text-3xl font-[Righteous] flex items-center space-x-2">
                    <i class="fas fa-plug"></i>
                    <span class="hidden md:inline">Kamarona</span>
                </a>
            </div>

            <!-- Menu Section -->
            <div class="hidden lg:flex space-x-6">
                <a href="#home" class="text-gray-800 hover:text-yellow-300 transition duration-300">Home</a>
                <a href="#shop" class="text-gray-800 hover:text-yellow-300 transition duration-300">Shop</a>
                <a href="#deals" class="text-gray-800 hover:text-yellow-300 transition duration-300">Deals</a>
                <a href="#about" class="text-gray-800 hover:text-yellow-300 transition duration-300">About</a>
                <a href="#contact" class="text-gray-800 hover:text-yellow-300 transition duration-300">Contact</a>
            </div>

            <!-- Search Bar Section -->
            <form class="flex items-center space-x-4">
                <!-- Search Bar with Icon -->
                <div class="relative flex-grow">
                    <input type="text" placeholder="Search products..."
                        class="px-4 py-2.5 rounded-lg bg-white border border-amber-100 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200/40 placeholder:text-gray-400 text-gray-700 transition-all w-full md:w-72 pr-12">
                    <!-- Search Icon -->
                    <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-amber-500/80"></i>
                </div>

                <!-- Cart Icon with Badge -->
                <a href="#cart" class="relative text-gray-600 hover:text-amber-600 transition-colors duration-200 ml-2">
                    <i class="far fa-shopping-cart text-xl"></i>
                    <span
                        class="absolute -top-1 -right-3 text-xs bg-amber-600 text-white rounded-full w-5 h-5 flex items-center justify-center shadow-sm border border-white">3</span>
                </a>

                <!-- User Profile Icon -->
                <a href="#profile" class="text-gray-600 hover:text-amber-600 transition-colors duration-200 ml-3">
                    <i class="far fa-user-circle text-xl"></i>
                </a>
            </form>



            <!-- Mobile Menu Icon -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-800 ml-2">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white px-6 py-4 hidden">
            <a href="#home" class="block text-gray-800 py-2 hover:text-yellow-300">Home</a>
            <a href="#shop" class="block text-gray-800 py-2 hover:text-yellow-300">Shop</a>
            <a href="#deals" class="block text-gray-800 py-2 hover:text-yellow-300">Deals</a>
            <a href="#about" class="block text-gray-800 py-2 hover:text-yellow-300">About</a>
            <a href="#contact" class="block text-gray-800 py-2 hover:text-yellow-300">Contact</a>
        </div>
    </nav>



    <!-- Hero Section -->
    <section class="relative h-[500px] md:h-[700px]">
        <!-- Video Background -->
        <video autoplay loop muted class="absolute inset-0 w-full h-full object-cover">
            <source src="https://v.ftcdn.net/09/13/40/66/700_F_913406609_bQ0tZ8gAbf7BJXvQxvPR3wEF9AV7dbNm_ST.mp4"
                type="video/mp4">
        </video>

        <!-- Dark Overlay to make text stand out -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content inside the hero section -->
        <div class="container mx-auto h-full flex justify-center items-center relative text-center text-white px-6">
            <div class="space-y-4">
                <!-- Headline -->
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                    Welcome to Kamarona
                </h1>
                <!-- Subheading -->
                <p class="text-lg md:text-2xl">
                    Discover the best electronics at unbeatable prices.
                </p>
                <!-- CTA Button -->
                <a href="#shop"
                    class="inline-block bg-yellow-500 text-gray-800 py-2 px-6 rounded-full text-lg font-semibold hover:bg-yellow-600 transition duration-300">
                    Shop Now
                </a>
            </div>
        </div>
    </section>



    @php
    $categories = [
    [
    'name' => 'TVs, Home Audio, and Home Theatre Accessories',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltecfad2235b10bd33/66846758534a9db3bcadde03/ht-20240705-homepage-sbc-icon.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/tvs-home-audio'
    ],
    [
    'name' => 'Computers and Tablets',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt24a700f32e929659/63be07ba013dbb4c68f9b3df/computing-evergreen-category-icon-computers-and-tablets.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/computers-tablets'
    ],
    [
    'name' => 'Computing Accessories',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltd9386dee2c0bb137/631a7b580a5bd94db562fe97/computing-evergreen-icon-computer-accessories.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/computing-accessories'
    ],
    [
    'name' => 'Headphones and Portable Speakers',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt9450d10d80be158b/6192ea614eed0e4a24dca596/homepage-shopbycategory-pa-on-sale.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/headphones-portable-speakers'
    ],
    [
    'name' => 'Wearable Technology',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt570fba736c35c750/65e104150f1d35993cca56e1/15929829_1.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/wearable-technology'
    ],
    [
    'name' => 'Cell Phones and Accessories',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt73c9d78a1a777d89/65d7c2a75d2ab283df73e4ef/wi-20240223-icon-cellphones-and-accessories.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/cell-phones-accessories'
    ],
    [
    'name' => 'Major Appliances',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltebba6ba1bd154354/5ee2c83e0f079e4334fd6c74/majorapps-icon.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/major-appliances'
    ],
    [
    'name' => 'Vacuums',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt2705e457feb84d61/62059060214fe9266428d3e4/vacuums-sbc-icon-12370687.jpeg?width=250&quality=80&auto=webp',
    'link' => '/category/vacuums'
    ],
    [
    'name' => 'Kitchen Appliances',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt051d0a8b7b479bb7/6644e3874b531eb1dfc30c36/17234373.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/kitchen-appliances'
    ],
    [
    'name' => 'Video Games and Accessories',
    'image_url' => 'https://multimedia.bbycastatic.ca/multimedia/products/150x150/174/17477/17477496.jpg',
    'link' => '/category/video-games-accessories'
    ],
    [
    'name' => 'Cameras and Camcorders',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltff769e2ada93c2db/5fa9e4b44e40cf53001f5252/di-evergreen-category-icon-cameras-drones.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/cameras-camcorders'
    ],
    [
    'name' => 'Smart Home',
    'image_url' =>
    'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltea880f7135258af9/65e11b0972b38733f422c650/sh-20240112-icon-hp-smart-home-white.jpg?width=250&quality=80&auto=webp',
    'link' => '/category/smart-home'
    ]

    ];
    @endphp


    <!-- Shop by Categories Section -->
    <section id="categories" class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <!-- Section Title -->
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-12">
                Shop by Categories
            </h2>

            <!-- Categories Grid -->
            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8">
                @foreach ($categories as $category)
                <div
                    class="group relative rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <!-- Category Image -->
                    <div class="p-2 md:p-6">
                        <a href="{{ $category['link'] }}" aria-label="{{ $category['name'] }} Category" class="block">
                            <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}"
                                class="w-full h-48 object-contain transition-transform duration-500 group-hover:scale-110">
                        </a>
                    </div>
                    <!-- Category Name -->
                    <a href="{{ $category['link'] }}" aria-label="Go to {{ $category['name'] }} category"
                        class="block py-4 text-sm md:text-base font-medium text-gray-800 px-3 hover:text-blue-500 transition duration-200 rounded-b-lg">
                        {{ $category['name'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>




    @php
    $laptops = [
    [
    "id" => 1,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/189/18925/18925110.jpeg",
    "name" => "Open Box - Apple MacBook Air 13.6\" with Touch ID (2022) - Midnight (Apple M2 / 16GB RAM / 256GB SSD) -
    English",
    "price" => 969.99,
    "original_price" => 1299.99,
    "discount" => 25,
    "rating" => 0.0,
    "reviews_count" => 0,
    "brand" => "Apple",
    "model" => "MacBook Air 13.6\" (2022)",
    "processor" => "Apple M2",
    "ram" => "16GB",
    "storage" => "256GB SSD",
    "description" => "Open Box Apple MacBook Air featuring Apple M2 chip, 16GB RAM, and 256GB SSD in Midnight color."
    ],
    [
    "id" => 2,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17952/17952861.jpeg",
    "name" => "HP Premium Stream 14\" HD BrightView Laptop, Intel Celeron N4120, 64GB eMMC, 16GB RAM, UHD Graphics, HD
    Webcam",
    "price" => 399.00,
    "original_price" => 549.00,
    "discount" => 27,
    "rating" => 4.36,
    "reviews_count" => 634,
    "brand" => "HP",
    "model" => "Premium Stream 14\"",
    "processor" => "Intel Celeron N4120",
    "ram" => "16GB",
    "storage" => "64GB eMMC",
    "description" => "Affordable laptop with Intel Celeron processor, 16GB RAM, and 64GB eMMC storage. Includes Office
    365 and 32GB Hotface USB card."
    ],
    [
    "id" => 3,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/169/16948/16948051.jpg",
    "name" => "Lenovo IdeaPad Slim 3i 15.6\" Laptop - Arctic Grey (Intel Core i5-1335U/16GB RAM/512GB SSD/Windows 11)",
    "price" => 699.99,
    "original_price" => 1099.99,
    "discount" => 36,
    "rating" => 4.6,
    "reviews_count" => 87,
    "brand" => "Lenovo",
    "model" => "IdeaPad Slim 3i 15.6\"",
    "processor" => "Intel Core i5-1335U",
    "ram" => "16GB",
    "storage" => "512GB SSD",
    "description" => "A slim and stylish laptop with Intel Core i5 processor, 16GB RAM, and 512GB SSD, running on
    Windows 11."
    ],
    [
    "id" => 4,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/176/17628/17628818.jpeg",
    "name" => "REFURBISHED (EXCELLENT) - DELL LATITUDE 7490 CI5-8350U 16GB DDR4 512GB SSD 14\" FHD W11P",
    "price" => 289.00,
    "original_price" => 650.00,
    "discount" => 56,
    "rating" => 5.0,
    "reviews_count" => 2,
    "brand" => "Dell",
    "model" => "Latitude 7490",
    "processor" => "Intel Core i5-8350U",
    "ram" => "16GB DDR4",
    "storage" => "512GB SSD",
    "description" => "Refurbished Dell Latitude 7490 with Intel Core i5-8350U processor, 16GB RAM, and 512GB SSD in
    excellent condition."
    ],
    [
    "id" => 5,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/169/16982/16982680.jpg",
    "name" => "HP 15\" Laptop with 1 Year of Microsoft 365 - Natural Silver (Intel N100/128GB SSD/4GB RAM)",
    "price" => 279.99,
    "original_price" => 429.99,
    "discount" => 35,
    "rating" => 4.04,
    "reviews_count" => 197,
    "brand" => "HP",
    "model" => "HP 15\" Laptop",
    "processor" => "Intel N100",
    "ram" => "4GB",
    "storage" => "128GB SSD",
    "description" => "Affordable HP laptop featuring Intel N100, 4GB RAM, 128GB SSD, and comes with 1-year Microsoft 365
    subscription."
    ],
    [
    "id" => 6,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/188/18893/18893052.jpeg",
    "name" => "HP - 15.6\" Touch-Screen Laptop for Students and Business - Intel Core i5-1235u - 16GB Memory - 512GB
    SSD",
    "price" => 649.99,
    "original_price" => 1049.99,
    "discount" => 38,
    "rating" => 0.0,
    "reviews_count" => 0,
    "brand" => "HP",
    "model" => "15.6\" Touch-Screen",
    "processor" => "Intel Core i5-1235U",
    "ram" => "16GB",
    "storage" => "512GB SSD",
    "description" => "Versatile 15.6\" HP laptop with touch-screen, Intel Core i5 processor, 16GB RAM, and 512GB SSD,
    perfect for students and business use."
    ],
    [
    "id" => 7,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/182/18245/18245883.jpg",
    "name" => "ASUS ROG Strix G15 15.6\" Gaming Laptop - Eclipse Grey (AMD Ryzen 7 6800H/8GB RAM/512GB SSD/GeForce RTX
    3050)",
    "price" => 1499.99,
    "original_price" => 1499.99,
    "discount" => 0,
    "rating" => 3.67,
    "reviews_count" => 3,
    "brand" => "ASUS",
    "model" => "ROG Strix G15",
    "processor" => "AMD Ryzen 7 6800H",
    "ram" => "8GB",
    "storage" => "512GB SSD",
    "description" => "Gaming laptop featuring AMD Ryzen 7 6800H, 8GB RAM, 512GB SSD, and GeForce RTX 3050 for a smooth
    gaming experience."
    ],
    [
    "id" => 8,
    "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/181/18142/18142773.png",
    "name" => "Dell Inspiron 15.6\" FHD Touchscreen Laptop, Intel Core i7-1255U, 1TB SSD, 16GB RAM, Intel Iris Xe
    Graphics",
    "price" => 949.00,
    "original_price" => 1409.00,
    "discount" => 33,
    "rating" => 5.0,
    "reviews_count" => 1,
    "brand" => "Dell",
    "model" => "Inspiron 15.6\" Touchscreen",
    "processor" => "Intel Core i7-1255U",
    "ram" => "16GB",
    "storage" => "1TB SSD",
    "description" => "Dell Inspiron 15.6\" laptop with a full HD touchscreen, Intel Core i7 processor, 16GB RAM, and 1TB
    SSD."
    ]
    ];
    @endphp







   <!-- section -->
   <section class="my-14">
    <div class="container mx-auto px-6">
        <!-- row -->
        <div class="flex flex-wrap">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-2">Top Selling Products</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Discover Your Ideal Product
                </h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                    Uncover the perfect items tailored to fit your lifestyle. Whether you're looking for a powerful work tool, a device for relaxation, or something for everyday use, we have a wide selection to suit all your needs.
                </p>
            </div>
        </div>
        

        <div class="swiper-container swiper pt-20" id="swiper-1" data-pagination-type="" data-speed="1600"
            data-space-between="20" data-pagination="false" data-navigation="true" data-autoplay="true"
            data-autoplay-delay="6000" data-effect="slide"
            data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 5}}'>
            <div class="swiper-wrapper">




                @foreach ($laptops as $laptop)



                <div class="swiper-slide">
                    <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
                        <div class="flex-auto p-4">
                            <div class="text-center relative flex justify-center">
                                <div class="absolute top-0 left-0">
                                    <span
                                        class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-red-600 text-white">Sale</span>
                                </div>
                                <a href="#!">
                                    <img src="{{ $laptop['image_url'] }}" alt="{{ $laptop['name'] }}"
                                        class="w-full h-auto" /></a>

                                <div class="absolute w-full bottom-[15%] opacity-0 invisible card-product-action">
                                    <a href="#!"
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="#!"
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-heart" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </a>
                                    <a href="#!"
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Compare">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrows-exchange" width="16"
                                            height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 10h14l-4 -4" />
                                            <path d="M17 14h-14l4 4" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <a href="#!" class="text-decoration-none text-gray-500"><small>Snack &
                                        Munchies</small></a>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-base truncate"><a href="./shop-single.html">Haldiram's Sev
                                            Bhujia</a></h3>
                                    <div class="flex items-center">
                                        <div class="flex flex-row gap-3">
                                            <small class="text-yellow-500 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-half-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>
                                            </small>
                                            <div class="flex flex-row gap-1">
                                                <span class="text-gray-500 text-sm">4.5</span>
                                                <span class="text-gray-500 text-sm">(149)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-900 font-semibold">$18</span>
                                        <span class="line-through text-gray-500">$24</span>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn inline-flex items-center gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="14" height="14"
                                                viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                            <span>Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                @endforeach


                <!-- Add more slides as needed -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-navigation">
                <div class="swiper-button-next top-[40px]"></div>
                <div class="swiper-button-prev top-[40px] !right-0 !left-auto mx-10"></div>
            </div>
        </div>
    </div>
</section>




    <!-- Laptops Category Section -->
    <section id="laptops" class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="container mx-auto px-6">
            <!-- Section Header with Enhanced Styling -->
            <div class="text-center mb-12">
                <span
                    class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-2">Recommended
                    for You</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Find Your Perfect Match
                </h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                    Explore personalized recommendations tailored to your needs. Whether for work, entertainment, or
                    everyday use, we’ve got something for everyone.
                </p>
            </div>


            <!-- Filter Bar -->
            {{-- <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                <!-- Search Box -->
                <div class="relative w-full md:w-auto">
                    <input type="text" placeholder="Search laptops..."
                        class="pl-10 pr-4 py-2 w-full md:w-64 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>

                <!-- Filter Dropdowns -->
                <div class="flex flex-wrap gap-3">
                    <select
                        class="px-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                        <option>All Brands</option>
                        <option>Apple</option>
                        <option>Dell</option>
                        <option>HP</option>
                        <option>Lenovo</option>
                    </select>

                    <select
                        class="px-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                        <option>Price Range</option>
                        <option>Under $500</option>
                        <option>$500 - $1,000</option>
                        <option>$1,000 - $1,500</option>
                        <option>$1,500+</option>
                    </select>

                    <select
                        class="px-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                        <option>Sort By</option>
                        <option>Popularity</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Highest Rated</option>
                    </select>
                </div>
            </div> --}}

            <!-- Products Grid with Enhanced Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                @foreach ($laptops as $laptop)
                <div
                    class="group relative rounded-xl flex flex-col justify-items-start shadow-md bg-white overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
                    <!-- Sale Badge (if applicable) -->
                    @if(isset($laptop['discount']) && $laptop['discount'] > 0)
                    <div
                        class="absolute top-3 left-3 z-10 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                        {{ $laptop['discount'] }}% off
                    </div>
                    @endif

                    <!-- Wishlist Button -->
                    <button
                        class="absolute top-3 right-3 z-10 bg-white p-2 rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors duration-200 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>

                    <!-- Product Image with Hover Effect -->
                    <a href="#" class="block h-56 md:h-64 overflow-hidden bg-white p-4">
                        <img src="{{ $laptop['image_url'] }}" alt="{{ $laptop['name'] }}"
                            class="w-full h-full object-contain transform transition-transform duration-500 group-hover:scale-110">
                    </a>

                    <!-- Product Info with Better Layout -->
                    <div class="p-5 flex flex-grow flex-col">
                        <!-- Brand Name -->
                        <p class="text-xs font-medium text-blue-600 mb-1">{{ $laptop['brand'] }}</p>

                        <!-- Product Name -->
                        <a href="#"
                            class="block text-base md:text-lg font-bold text-gray-800 hover:text-blue-600 transition-colors mb-2 line-clamp-2"
                            title="{{ $laptop['name'] }}">
                            {{ $laptop['name'] }}
                        </a>

                        <!-- Brief Specs -->
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                            {{ $laptop['processor'] }} • {{ $laptop['ram'] }} RAM • {{ $laptop['storage'] }}
                        </p>

                        <!-- Rating Stars -->
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($laptop['rating'])) <i class="fas fa-star">
                                    </i>
                                    @elseif ($i - 0.5 <= $laptop['rating']) <i class="fas fa-star-half-alt"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                            </div>
                            <span class="text-xs text-gray-500 ml-2">({{ $laptop['reviews_count'] }} reviews)</span>
                        </div>

                        <!-- Price Section with Old Price -->
                        <div class="flex items-center space-x-2 mb-4">
                            @if(isset($laptop['original_price']))
                            <p class="text-sm text-gray-500 line-through">${{ number_format($laptop['original_price'],
                                2) }}</p>
                            @endif
                            <p class="text-xl font-bold text-gray-800">${{ number_format($laptop['price'], 2) }}</p>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex space-x-2 mt-auto">
                            <a href="#"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm text-center transition-colors duration-200 shadow-sm">
                                Add to Cart <i class="far fa-shopping-cart ml-2"></i>
                            </a>
                            <a href="#"
                                class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                                Details
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                    View All Laptops
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>



 


    @php
    // Controller or View
    $testimonials = [
    [
    'name' => 'David R.',
    'role' => 'Freelance Developer',
    'image' =>
    'https://images.generated.photos/tGHubInlYQSUapLmz6IdvNuew4iOgEMbgEtV0u_WB2s/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/NTkzNTE4LmpwZw.jpg',
    'quote' => 'I found the perfect laptop for my work and gaming needs. The pricing was unbeatable and delivery was
    super fast. Will definitely shop here again!'
    ],
    [
    'name' => 'Lisa T.',
    'role' => 'Marketing Specialist',
    'image' =>
    'https://images.generated.photos/sQO382vTFE2AeD_55KCemqzo9YoEzxcDB92Vd7QUgCk/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/ODg1NTM3LmpwZw.jpg',
    'quote' => 'I’ve never had such a smooth online shopping experience. The customer support team helped me pick the
    right phone, and it arrived in perfect condition!'
    ],
    [
    'name' => 'Maria F.',
    'role' => 'Home Chef',
    'image' =>
    'https://images.generated.photos/6Prm4DWHZB98c-seirSy3wZQJMhhFYMfnhYxeekucrE/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/ODI0MDU3LmpwZw.jpg',
    'quote' => 'I was a bit hesitant at first, but I’m so glad I bought my new kitchen appliance from this site.
    Excellent product quality, and the price was great!'
    ],
    [
    'name' => 'Maria F.',
    'role' => 'Home Chef',
    'image' =>
    'https://images.generated.photos/WSXXGpFeBy9JAeyrp81B1ecXfwIGmIJ5SyDYaTgxfMQ/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/MTUyOTQxLmpwZw.jpg',
    'quote' => 'I was a bit hesitant at first, but I’m so glad I bought my new kitchen appliance from this site.
    Excellent product quality, and the price was great!'
    ],
    ];

    @endphp

    <!-- Testimonials Section -->
    <div class="text-center my-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">What Our Customers Are Saying</h2>
        <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
            Hear from our happy customers who found the perfect gadgets and deals for their needs.
        </p>

        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($testimonials as $testimonial)
            <div class="max-w-xs bg-white rounded-lg shadow-lg p-6">
                <img src="{{ $testimonial['image'] }}" alt="Customer" class="w-16 h-16 rounded-full mx-auto mb-4">
                <p class="text-gray-600 italic mb-4">{{ $testimonial['quote'] }}</p>
                <p class="font-semibold text-gray-800">{{ $testimonial['name'] }}</p>
                <p class="text-gray-500">{{ $testimonial['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>




    <!-- Call to Action Section -->
    <section id="cta" class="bg-blue-300 py-12 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-4">Get Started Today!</h2>
            <p class="text-lg mb-6">Join us now and take advantage of exclusive deals, offers, and updates right to your
                inbox!</p>

            <!-- Subscribe Field and Buttons Row -->
            <div class="flex flex-col md:flex-row justify-center gap-6 items-center">
                <!-- Subscribe Field -->
                <div class="flex items-center bg-white rounded-lg p-2 mb-4 sm:mb-0 w-full sm:w-auto">
                    <input type="email" id="subscribeEmail" placeholder="Enter your email"
                        class="py-3 px-4 text-gray-700 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 w-full sm:w-80" />
                    <button type="submit"
                        class="bg-amber-600 hover:bg-amber-500 text-white py-3 px-6 rounded-r-lg text-lg transition duration-300">
                        Subscribe
                    </button>
                </div>

                <!-- Sign Up Button -->
                <a href="#signup"
                    class="bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg text-lg transition duration-300">
                    Sign Up Now
                </a>
            </div>
        </div>
    </section>






    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <!-- Footer Top Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">
                <!-- About Us Section -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">About Us</h4>
                    <p class="text-gray-400 text-sm">We are an online electronics mall providing the best deals on top
                        brands of laptops, smartphones, home appliances, and more.</p>
                </div>
                <!-- Customer Service Section -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Customer Service</h4>
                    <ul class="text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-yellow-400">Contact Us</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Returns & Exchanges</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Shipping Information</a></li>
                        <li><a href="#" class="hover:text-yellow-400">FAQ</a></li>
                    </ul>
                </div>
                <!-- Quick Links Section -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-yellow-400">Shop</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Deals</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Terms & Conditions</a></li>
                    </ul>
                </div>
                <!-- Social Media Section -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-yellow-400"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Section -->
            <div class="border-t border-gray-700 pt-8">
                <p class="text-center text-sm text-gray-400">&copy; 2025 Kamarona Electronics Mall. All rights reserved.
                </p>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <!-- Swiper JS Initialization -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



    <script>
        function initializeSwiperCarousels() {
  // Select all swiper containers and loop through each one
  document.querySelectorAll(".swiper-container").forEach(carousel => {
    // Get configuration values from the element's data attributes, with defaults
    const speed = carousel.getAttribute("data-speed") || 400;
    const spaceBetween = carousel.getAttribute("data-space-between") || 100;
    const hasPagination = "true" === carousel.getAttribute("data-pagination");
    const hasNavigation = "true" === carousel.getAttribute("data-navigation");
    const hasAutoplay = "true" === carousel.getAttribute("data-autoplay");
    const autoplayDelay = carousel.getAttribute("data-autoplay-delay") || 3000;
    const paginationType = carousel.getAttribute("data-pagination-type") || "bullets";
    const effect = carousel.getAttribute("data-effect") || "slide";
    const breakpointsData = carousel.getAttribute("data-breakpoints");

    let breakpoints = {};

    // If breakpoints data exists, try to parse it as JSON
    if (breakpointsData) {
      try {
        breakpoints = JSON.parse(breakpointsData);
      } catch (error) {
        console.error("Error parsing breakpoints data:", error);
      }
    }

    // Default swiper configuration
    const swiperConfig = {
      speed: parseInt(speed),
      spaceBetween: parseInt(spaceBetween),
      breakpoints: breakpoints,
      effect: effect,
    };

    // If effect is "fade", enable fadeEffect
    if (effect === "fade") {
      swiperConfig.fadeEffect = { crossFade: true };
    }

    // Configure pagination if enabled
    if (hasPagination) {
      const paginationElement = carousel.querySelector(".swiper-pagination");
      swiperConfig.pagination = {
        el: paginationElement,
        type: paginationType,
        dynamicBullets: true,
        clickable: true,
      };

      // If pagination type is custom, define custom rendering
      if (paginationType === "custom") {
        swiperConfig.pagination.renderCustom = (swiper, current, total) => {
          let paginationHtml = "";
          for (let i = 1; i <= total; i++) {
            if (current === i) {
              paginationHtml += `<span class="swiper-pagination-numbers swiper-pagination-numbers-active">${i}</span>`;
            } else {
              paginationHtml += `<span class="swiper-pagination-numbers">${i}</span>`;
            }
          }
          return paginationHtml;
        };
      }
    }

    // Configure navigation if enabled
    if (hasNavigation) {
      swiperConfig.navigation = {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      };
    } else {
      const navigationElement = carousel.querySelector(".swiper-navigation");
      if (navigationElement) {
        navigationElement.classList.add("swiper-navigation-hidden");
      }
    }

    // Configure autoplay if enabled
    if (hasAutoplay) {
      swiperConfig.autoplay = {
        delay: parseInt(autoplayDelay),
      };
    }

    // Initialize the Swiper instance with the calculated config
    new Swiper(carousel, swiperConfig);
  });
}

// Initialize all Swiper carousels
initializeSwiperCarousels();




        // Toggle the mobile menu
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
    </script>

</body>

</html>