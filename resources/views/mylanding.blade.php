<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamarona Electronics Mall</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Google Font: Righteous -->
    <link
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">


    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{  asset('assets/font-awesome-6-pro-main/css/all.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"> 

    <style>
        :root {
            --swiper-theme-color: #0aad0a;
            --swiper-pagination-color: #0aad0a;
            --swiper-pagination-bullet-opacity: 1
        } 
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

<body class="bg-gray-50 font-[Roboto]" 
x-data="
{ 
mobileMenuOpen: false, 
searchModalOpen: false, 
openRegisterModal: false 
}">

    <x-home.navbar-section/>
    <x-home.hero-section/> 
    <x-home.search-modal/> 
    <x-home.register-login-modal/>


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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8">
                @foreach ($categories as $category)
                <div
                    class="group relative rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <!-- Category Image -->
                    <div class="p-2 md:p-6">
                        <a href="{{ $category['link'] }}" aria-label="{{ $category['name'] }} Category" class="block">
                            <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}"
                                class="w-full h-32 lg:h-48 object-contain transition-transform duration-500 group-hover:scale-110">
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
$products = [
    [
        "id" => 1,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18481/18481518.jpg",
        "name" => "Samsung 50\" 4K UHD HDR LED Tizen OS Smart TV (UN50DU7200FXZC) - 2024",
        "price" => 499.99,
        "original_price" => 795.99,
        "discount" => 16,
        "rating" => 4.42,
        "reviews_count" => 1652,
        "brand" => "Samsung",
        "category_name" => "Electronics",
        "model" => "UN50DU7200FXZC",
        "description" => "Samsung 50\" 4K UHD HDR LED Smart TV with Tizen OS, featuring high-quality display and a sleek design."
    ],
    [
        "id" => 2,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17902/17902840.jpg",
        "name" => "Sony ULT WEAR Over-Ear Noise Cancelling Bluetooth Headphones - Off White",
        "price" => 199.99,
        "original_price" => 259.99,
        "discount" => 24,
        "rating" => 4.5,
        "reviews_count" => 22,
        "brand" => "Sony",
        "category_name" => "Headphones",
        "model" => "ULT WEAR Over-Ear",
        "description" => "Sony ULT WEAR Bluetooth headphones with noise cancelling, providing immersive sound and comfort."
    ],
    [
        "id" => 3,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/170/17087/17087947.jpg",
        "name" => "Segway Ninebot KickScooter MAX G2 Electric Scooter (900 W Motor / 50km Range / 35.4km/h Top Speed) - Dark Grey",
        "price" => 1210.99,
        "original_price" => 1499.99,
        "discount" => 13,
        "rating" => 4.58,
        "reviews_count" => 475,
        "brand" => "Segway",
        "category_name" => "Electric Scooters",
        "model" => "Ninebot KickScooter MAX G2",
        "description" => "Segway Ninebot MAX G2 Electric Scooter, offering 900W motor, 50km range, and a top speed of 35.4 km/h. Ideal for commuting and recreational use."
    ],
    [
        "id" => 4,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/123/12383/12383793.jpg",
        "name" => "Sony Alpha a7 III Full-Frame Mirrorless Vlogger Camera with 28-70mm OSS Lens Kit",
        "price" => 2978.99,
        "original_price" => 3399.99,
        "discount" => 19,
        "rating" => 4.85,
        "reviews_count" => 1737,
        "brand" => "Sony",
        "category_name" => "Cameras",
        "model" => "Alpha a7 III",
        "description" => "Sony Alpha a7 III Full-Frame Mirrorless Camera with 28-70mm OSS Lens Kit, designed for vloggers and photographers who demand superior quality and performance."
    ],
    [
        "id" => 5,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17981/17981254.jpg",
        "name" => "HP 15.6\" Laptop - Natural Silver (Intel Core i7 1255U/16GB RAM/1TB SSD/Windows 11)",
        "price" => 799.99,
        "original_price" => 999.99,
        "discount" => 18,
        "rating" => 4.04,
        "reviews_count" => 221,
        "brand" => "HP",
        "category_name" => "Laptops",
        "model" => "HP 15.6\" Laptop",
        "description" => "HP 15.6\" Laptop with Intel Core i7, 16GB RAM, and 1TB SSD, running Windows 11 for smooth performance and productivity."
    ],
    [
        "id" => 6,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/189/18925/18925586.jpg",
        "name" => "Samsung Galaxy S25 128GB - Icyblue - Unlocked",
        "price" => 1199.99,
        "original_price" => 998.99,
        "discount" => 11,
        "rating" => 3.0,
        "reviews_count" => 2,
        "brand" => "Samsung",
        "category_name" => "Smartphones",
        "model" => "Galaxy S25",
        "description" => "Samsung Galaxy S25 128GB with Icyblue finish, unlocked for use with any carrier, featuring advanced mobile technology."
    ],
    [
        "id" => 7,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/165/16567/16567284.jpg",
        "name" => "Apple iPad Pro 12.9\" 2TB with Wi-Fi (6th Generation) - Space Grey",
        "price" => 1929.99,
        "original_price" => 2129.99,
        "discount" => 8,
        "rating" => 0.0,
        "reviews_count" => 0,
        "brand" => "Apple",
        "category_name" => "Tablets",
        "model" => "iPad Pro 12.9\"",
        "description" => "Apple iPad Pro 12.9\" 2TB, with Wi-Fi and 6th Generation performance, featuring a stunning display and powerful hardware."
    ],
    // New Products
    [
        "id" => 8,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/163/16374/16374006.jpg",
        "name" => "Breville Barista Express Impress Espresso Machine (BES876BSS1BNA1) - Brushed Stainless Steel",
        "price" => 899.99,
        "original_price" => 1149.99,
        "discount" => 250,
        "rating" => 4.7,
        "reviews_count" => 592,
        "brand" => "Breville",
        "category_name" => "Kitchen Appliances",
        "model" => "BES876BSS1BNA1",
        "description" => "The Breville Barista Express Impress Espresso Machine offers expert-quality espresso at home with a brushed stainless steel finish."
    ],
    [
        "id" => 9,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17900/17900147.jpg",
        "name" => "Ninja CREAMi Deluxe 11-in-1 Ice Cream Maker - Silver",
        "price" => 229.99,
        "original_price" => 299.99,
        "discount" => 70,
        "rating" => 4.26,
        "reviews_count" => 216,
        "brand" => "Ninja",
        "category_name" => "Kitchen Appliances",
        "model" => "CREAMi Deluxe",
        "description" => "The Ninja CREAMi Deluxe 11-in-1 Ice Cream Maker helps you create a variety of frozen desserts, from ice cream to sorbets, with ease."
    ],
    [
        "id" => 10,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/137/13797/13797305.jpg",
        "name" => "JBL Flip 5 Waterproof Bluetooth Wireless Speaker - Black",
        "price" => 109.99,
        "original_price" => 159.99,
        "discount" => 50,
        "rating" => 4.7,
        "reviews_count" => 6713,
        "brand" => "JBL",
        "category_name" => "Audio",
        "model" => "Flip 5",
        "description" => "JBL Flip 5 Waterproof Bluetooth Wireless Speaker delivers high-quality sound in a compact, durable design that’s perfect for outdoor adventures."
    ]
];
@endphp





   <!-- section -->
   <section class="bg-blue-50 bg-opacity-50 to-white py-14">
    <div class="container mx-auto px-6">
        <!-- row --> 
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-2">Top Selling Products</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Discover Your Ideal Product
            </h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Uncover the perfect items tailored to fit your lifestyle. Whether you're looking for a powerful work tool, a device for relaxation, or something for everyday use, we have a wide selection to suit all your needs.
            </p>
        </div> 
        

        <div class="swiper-container swiper pt-20" id="swiper-1" data-pagination-type="" data-speed="1600"
            data-space-between="20" data-pagination="false" data-navigation="true" data-autoplay="true"
            data-autoplay-delay="6000" data-effect="slide"
            data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 4}, "1424": {"slidesPerView": 5}}'>
            <div class="swiper-wrapper">




                @foreach ($products as $product)
    <div class="swiper-slide">
        <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
            <div class="flex-auto p-4">
                <div class="text-center relative flex justify-center">
                    <div class="absolute top-0 left-0 z-10">

                        @if ($product['discount'] > 0)
                            <span class="inline-block px-2 py-1 rounded-md text-center font-semibold text-sm align-baseline 
                            leading-none bg-red-500 text-white">{{ $product['discount'] }}% off
                            </span>
                        @endif
                    </div>
                    <a href="#!">
                        <!-- Image with Zoom Effect on Hover -->
                        <div class="relative group">
                            <img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}"
                                class="w-full p-4 h-32 lg:h-48 transition-transform duration-300 transform group-hover:scale-110" />
                        </div>
                    </a>
                </div>
                <div class="flex flex-col gap-3">
                    <a href="#!" class="text-decoration-none text-gray-500"><small> {{ $product['category_name'] }}</small></a>
                    <div class="flex flex-col gap-2">
                        <h3 class="text-base truncate"><a href="./shop-single.html">{{ $product['name'] }}</a></h3>
                        <div class="flex items-center">
                            <div class="flex flex-row gap-3">
                                <!-- Rating Stars -->
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400 small">
                                        @for ($i = 1; $i <= 5; $i++) 
                                            @if ($i <=floor($product['rating'])) 
                                                <i class="fa-solid fa-star"></i>
                                            @elseif ($i - 0.5 <= $product['rating']) 
                                                <i class="fa-solid fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">({{ $product['reviews_count'] }} reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-semibold">${{ $product['price'] }}</span>
                            <span class="line-through text-gray-500">${{ $product['original_price'] }}</span>
                        </div>
                        <div>
                            <!-- Wishlist Button -->
                            <button class="relative py-2 px-3 rounded-full shadow-md bg-gray-200 hover:bg-red-100 transition-colors duration-200 focus:outline-none group">
                                <i class="fal fa-heart text-gray-400 group-hover:text-red-500 transition-colors duration-300"></i>
                                <!-- Heart Icon Fill Animation -->
                                <div class="absolute top-0 left-0 right-0 bottom-0 bg-red-500 opacity-0 group-hover:opacity-30 rounded-full transition-opacity duration-300"></div>
                            </button>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex space-x-2 mt-auto">
                        <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm text-center transition-colors duration-200 shadow-sm">
                            Add <span class="hidden xl:inline">to Cart</span> 
                            <i class="far fa-shopping-cart ml-2"></i>
                        </a>
                        <a href="#" class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            Details
                        </a>
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


@php
$allProducts = [
    [
        "id" => 1,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/189/18925/18925110.jpeg",
        "name" => "Open Box - Apple MacBook Air 13.6\" with Touch ID (2022) - Midnight (Apple M2 / 16GB RAM / 256GB SSD) - English",
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
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/165/16566/16566905.jpg",
        "name" => "Apple iPad 10.9\" 64GB with Wi-Fi 6 (10th Generation) - Silver",
        "price" => 439.99,
        "original_price" => 499.99,
        "discount" => 12,
        "rating" => 4.42,
        "reviews_count" => 12,
        "brand" => "Apple",
        "model" => "iPad 10.9\" (10th Generation)",
        "processor" => "Apple A14 Bionic",
        "ram" => "4GB",
        "storage" => "64GB",
        "description" => "Apple iPad 10.9\" with Wi-Fi 6, featuring a 10th generation Apple A14 Bionic chip, 4GB RAM, and 64GB storage."
    ],
    [
        "id" => 3,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/155/15557/15557657.jpg",
        "name" => "Soundcore by Anker Life Tune Pro Over-Ear Noise Cancelling Bluetooth Headphones - Blue",
        "price" => 59.99,
        "original_price" => 159.99,
        "discount" => 62,
        "rating" => 4.24,
        "reviews_count" => 49,
        "brand" => "Anker",
        "model" => "Life Tune Pro",
        "processor" => "Bluetooth 5.0",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Anker Life Tune Pro Over-Ear Noise Cancelling Bluetooth Headphones in Blue. Provides superior sound quality and noise cancellation."
    ],
    [
        "id" => 4,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/153/15386/15386732.jpg",
        "name" => "HP DeskJet 2755e Wireless All-In-One Inkjet Printer - HP Instant Ink 3-Month Free Trial Included*",
        "price" => 59.99,
        "original_price" => 104.99,
        "discount" => 43,
        "rating" => 4.14,
        "reviews_count" => 5460,
        "brand" => "HP",
        "model" => "DeskJet 2755e",
        "processor" => "N/A",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "HP DeskJet 2755e wireless all-in-one inkjet printer, featuring a 3-month free trial of HP Instant Ink."
    ],
    [
        "id" => 5,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18470/18470962.jpg",
        "name" => "Apple AirPods 4 In-Ear True Wireless Earbuds with USB-C Charging Case",
        "price" => 159.99,
        "original_price" => 179.99,
        "discount" => 11,
        "rating" => 3.69,
        "reviews_count" => 13,
        "brand" => "Apple",
        "model" => "AirPods 4",
        "processor" => "Apple H1 Chip",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Apple AirPods 4 In-Ear true wireless earbuds with USB-C charging case. Features Apple H1 chip for seamless connectivity."
    ],
    [
        "id" => 6,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/149/14933/14933348.jpg",
        "name" => "Samsung 27\" FHD 75Hz 5ms GTG IPS LED FreeSync Monitor (LF27T350FHNXZA) - Dark Blue Grey",
        "price" => 129.99,
        "original_price" => 149.99,
        "discount" => 13,
        "rating" => 4.65,
        "reviews_count" => 6683,
        "brand" => "Samsung",
        "model" => "LF27T350FHNXZA",
        "processor" => "N/A",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Samsung 27\" FHD IPS LED FreeSync monitor with 75Hz refresh rate, 5ms GTG response time, and a sleek dark blue-grey design."
    ],
    [
        "id" => 7,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/181/18150/18150113.jpg",
        "name" => "Toshiba 43\" 1080p HD LED Fire Smart TV (43V35KU) - 2024",
        "price" => 249.99,
        "original_price" => 299.99,
        "discount" => 17,
        "rating" => 4.63,
        "reviews_count" => 1103,
        "brand" => "Toshiba",
        "model" => "43V35KU",
        "processor" => "N/A",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Toshiba 43\" 1080p HD LED Fire Smart TV with Fire TV built-in for seamless streaming experience."
    ],
    [
        "id" => 8,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/172/17278/17278649.jpg",
        "name" => "Apple AirPods Pro 2 Noise Cancelling True Wireless Earbuds with USB-C MagSafe Charging Case",
        "price" => 279.99,
        "original_price" => 329.99,
        "discount" => 15,
        "rating" => 4.37,
        "reviews_count" => 49,
        "brand" => "Apple",
        "model" => "AirPods Pro 2",
        "processor" => "Apple H2 Chip",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Apple AirPods Pro 2 with Noise Cancellation and MagSafe charging case featuring Apple H2 chip for high-quality sound."
    ],
    [
        "id" => 9,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18481/18481518.jpg",
        "name" => "Samsung 50\" 4K UHD HDR LED Tizen OS Smart TV (UN50DU7200FXZC) - 2024",
        "price" => 469.99,
        "original_price" => 599.99,
        "discount" => 22,
        "rating" => 4.42,
        "reviews_count" => 1652,
        "brand" => "Samsung",
        "model" => "UN50DU7200FXZC",
        "processor" => "N/A",
        "ram" => "N/A",
        "storage" => "N/A",
        "description" => "Samsung 50\" 4K UHD HDR LED Smart TV featuring Tizen OS with stunning 4K resolution and HDR support."
    ],
    [
        "id" => 10,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/188/18896/18896891.jpg",
        "name" => "Samsung Galaxy A16 5G 128GB - Blue Black - Unlocked",
        "price" => 239.99,
        "original_price" => 269.99,
        "discount" => 11,
        "rating" => 5.0,
        "reviews_count" => 1,
        "brand" => "Samsung",
        "model" => "Galaxy A16 5G",
        "processor" => "Exynos 850",
        "ram" => "4GB",
        "storage" => "128GB",
        "description" => "Samsung Galaxy A16 5G with 128GB storage, 4GB RAM, and Exynos 850 processor. Unlocked for all carriers."
    ],
    [
        "id" => 11,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18486/18486669.jpg",
        "name" => "Acer Aspire Go 15.6\" Laptop - Silver (Intel N100/8GB RAM/512GB SSD/Windows 11)",
        "price" => 399.99,
        "original_price" => 549.99,
        "discount" => 27,
        "rating" => 5.0,
        "reviews_count" => 3,
        "brand" => "Acer",
        "model" => "Aspire Go",
        "processor" => "Intel N100",
        "ram" => "8GB",
        "storage" => "512GB SSD",
        "description" => "Acer Aspire Go 15.6\" Laptop with Intel N100 processor, 8GB RAM, and 512GB SSD."
    ],
    [
        "id" => 12,
        "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17981/17981254.jpg",
        "name" => "HP 15.6\" Laptop - Natural Silver (Intel Core i7 1255U/16GB RAM/1TB SSD/Windows 11)",
        "price" => 799.99,
        "original_price" => 999.99,
        "discount" => 20,
        "rating" => 4.04,
        "reviews_count" => 221,
        "brand" => "HP",
        "model" => "HP 15.6\" Laptop",
        "processor" => "Intel Core i7 1255U",
        "ram" => "16GB",
        "storage" => "1TB SSD",
        "description" => "HP 15.6\" Laptop with Intel Core i7, 16GB RAM, and 1TB SSD storage."
    ]
];

@endphp


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
                @foreach ($allProducts as $product)
                <div
                    class="group relative rounded-xl flex flex-col justify-items-start shadow-md bg-white overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
                    <!-- Sale Badge (if applicable) -->
                    @if(isset($product['discount']) && $product['discount'] > 0)
                    <div
                        class="absolute top-3 left-3 z-10 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                        {{ $product['discount'] }}% off
                    </div>
                    @endif

                    <!-- Wishlist Button -->
                    <button
                        class="absolute top-3 right-3 z-10 bg-white p-2 rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors duration-200 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>

                    <!-- Product Image with Hover Effect -->
                    <a href="#" class="block h-48 md:h-56 overflow-hidden bg-white p-4">
                        <img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}"
                            class="w-full h-32 lg:h-48 object-contain transform transition-transform duration-500 group-hover:scale-110">
                    </a>

                    <!-- Product Info with Better Layout -->
                    <div class="p-5 flex flex-grow flex-col">
                        <!-- Brand Name -->
                        <p class="text-xs font-medium text-blue-600 mb-1">{{ $product['brand'] }}</p>

                        <!-- Product Name -->
                        <a href="#"
                            class="block text-base md:text-lg font-bold text-gray-800 hover:text-blue-600 transition-colors mb-2 line-clamp-2"
                            title="{{ $product['name'] }}">
                            {{ $product['name'] }}
                        </a>

                        <!-- Brief Specs -->
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                            {{ $product['processor'] }} • {{ $product['ram'] }} RAM • {{ $product['storage'] }}
                        </p>

                        <!-- Rating Stars -->
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($product['rating'])) <i class="fas fa-star">
                                    </i>
                                    @elseif ($i - 0.5 <= $product['rating']) 
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-xs text-gray-500 ml-2">({{ $product['reviews_count'] }} reviews)</span>
                        </div>

                        <!-- Price Section with Old Price -->
                        <div class="flex items-center space-x-2 mb-4">
                            @if(isset($product['original_price']))
                            <p class="text-sm text-gray-500 line-through">${{ number_format($product['original_price'],
                                2) }}</p>
                            @endif
                            <p class="text-xl font-bold text-gray-800">${{ number_format($product['price'], 2) }}</p>
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
                    View All Products
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>



  

<section class="why-choose-us py-16 bg-gray-100">
    <div class="container mx-auto text-center px-4">
        <h2 class="text-3xl font-semibold mb-8">Why Choose Us</h2>
        <p class="text-lg text-gray-600 mb-12">We strive to provide the best products and services for our customers. Here's why you should choose us:</p>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Reason 1 -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="text-4xl text-blue-500 mb-4">
                    <i class="fal fa-cogs"></i> <!-- Font Awesome Pro Light icon -->
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Top-Quality Products</h3>
                <p class="text-gray-600">We offer only the best products that are durable, reliable, and backed by customer satisfaction guarantees.</p>
            </div>
            <!-- Reason 2 -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="text-4xl text-green-500 mb-4">
                    <i class="far fa-headset"></i> <!-- Font Awesome Pro Regular icon -->
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Exceptional Customer Service</h3>
                <p class="text-gray-600">Our dedicated support team is available 24/7 to assist you with any questions or concerns you may have.</p>
            </div>
            <!-- Reason 3 -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="text-4xl text-yellow-500 mb-4">
                    <i class="fal fa-truck"></i> <!-- Font Awesome Pro Light icon -->
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Fast & Reliable Shipping</h3>
                <p class="text-gray-600">We offer fast and reliable shipping options to ensure your orders reach you on time, every time.</p>
            </div>
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

        <!-- Subscribe Section -->
        <div class="bg-gray-700 py-8 px-6 rounded-lg mb-8">
            <h4 class="text-lg font-semibold text-center text-white mb-4">Subscribe to Our Newsletter</h4>
            <p class="text-center text-gray-400 mb-6">Get the latest updates on new products and exclusive deals directly in your inbox!</p>
            <div class="flex justify-center">
                <input type="email" class="w-1/2 md:w-1/3 lg:w-1/4 p-3 text-sm rounded-l-lg bg-gray-900 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Enter your email" />
                <button class="bg-yellow-500 text-white px-6 py-3 rounded-r-lg text-sm font-medium hover:bg-yellow-600 transition-colors duration-200 focus:outline-none">
                    Subscribe
                </button>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="border-t border-gray-700 pt-8">
            <p class="text-center text-sm text-gray-400">&copy; 2025 Kamarona Electronics Mall. All rights reserved.</p>
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



 
    </script>

</body>

</html>