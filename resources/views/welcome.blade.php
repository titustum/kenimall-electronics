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
                        <a href="#" aria-label="{{ $category->name }} Category" class="block">
                            <img src="{{ $category->image_url }}" alt="{{$category->name  }}"
                                class="w-full h-32 lg:h-48 object-contain transition-transform duration-500 group-hover:scale-110">
                        </a>
                    </div>
                    <!-- Category Name -->
                    <a href="#" aria-label="Go to {{ $category->name  }} category"
                        class="block py-4 text-sm md:text-base font-medium text-gray-800 px-3 hover:text-blue-500 transition duration-200 rounded-b-lg">
                        {{$category->name  }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>








 





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

                                    @if ($product->discount > 0)
                                        <span class="inline-block px-2 py-1 rounded-md text-center font-semibold text-sm align-baseline 
                                        leading-none bg-red-500 text-white">{{ $product->discount }}% off
                                        </span>
                                    @endif
                                </div>
                                <a href="#!">
                                    <!-- Image with Zoom Effect on Hover -->
                                    <div class="relative group">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="w-full p-4 h-32 lg:h-48 transition-transform duration-300 transform group-hover:scale-110" />
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-col gap-3">
                                <a href="#!" class="text-decoration-none text-gray-500"><small> {{ $product->category->name }}</small></a>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-base truncate"><a href="./shop-single.html">{{ $product->name }}</a></h3>
                                    <div class="flex items-center">
                                        <div class="flex flex-row gap-3">
                                            <!-- Rating Stars -->
                                            <div class="flex items-center mb-3">
                                                <div class="flex text-yellow-400 small">
                                                    @for ($i = 1; $i <= 5; $i++) 
                                                        @if ($i <=floor($product->rating)) 
                                                            <i class="fa-solid fa-star"></i>
                                                        @elseif ($i - 0.5 <= $product->rating) 
                                                            <i class="fa-solid fa-star-half-alt"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="text-xs text-gray-500 ml-2">({{ $product->reviews_count }} reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-900 font-semibold">${{ $product->price }}</span>
                                        <span class="line-through text-gray-500">${{ $product->original_price }}</span>
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

 


<!-- Recommended Products Category Section -->
<x-home.recommended-products :products=$products/>




  

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