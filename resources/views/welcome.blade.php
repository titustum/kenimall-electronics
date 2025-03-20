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


    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{  asset('assets/font-awesome-6-pro-main/css/all.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"> 

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-offcanvas/1.0.0/bootstrap-offcanvas.min.css">  --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    

</head>

<body class="bg-gray-50 font-[Roboto]" 
x-data="
{ 
mobileMenuOpen: false, 
searchModalOpen: false, 
openRegisterModal: false,
openOffcanvasMenu: false,
activeDropdown: null,
openModal(productData) {
    this.product = productData;
    this.quickViewModal = true;
},
quickViewModal: false, 
product: null,
}">

    <x-home.navbar-section/>
    <x-home.ofcanvas-modal/>
    <x-home.hero-section/> 
    <x-home.search-modal/> 
    <x-home.register-login-modal/>

    <x-home.shop-by-categories-section :categories="$categories"/>



    <section class="container mx-auto max-w-[1920px] px-4 md:px-8 2xl:px-16 bg-white">
        <div class="mb-12 md:mb-14 xl:mb-16 border border-gray-300 rounded-md pt-5 md:pt-6 lg:pt-7 pb-5 lg:pb-7 px-4 md:px-5 lg:px-7">
            <div class="flex justify-between items-center flex-wrap mb-5 md:mb-6">
                <div class="flex items-center justify-between -mt-2 mb-0">
                    <h3 class="text-lg md:text-xl lg:text-2xl 2xl:text-3xl xl:leading-10 font-bold text-heading">New Arrivals</h3>
                </div>
                <span>
                    All
                    <i class="fas fa-chevron-right text-gray-400 cursor-pointer transition duration-150 ease-in-out"></i>
                </span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-x-3 md:gap-x-5 xl:gap-x-7 gap-y-4 lg:gap-y-5 xl:gap-y-6 2xl:gap-y-8">


                @foreach ($products as $product)
                    
                <div @click="openModal({{ json_encode($product) }})" class="group box-border overflow-hidden flex rounded-md cursor-pointer bg-white ltr:pr-0 rtl:pl-0 md:pb-1 flex-col items-start" role="button" title="{{ $product->name }}">
                    <div class="flex mb-3 md:mb-3.5 pb-0">
                        <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                            <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                                <img
                                    alt=""
                                    aria-hidden="true"
                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27324%27%20height=%27324%27/%3e"
                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"
                                />
                            </span>
                            <img
                                alt="{{ $product->name }}"
                                src="{{ $product->image_url }}"
                                loading="lazy"
                                decoding="async"
                                data-nimg="intrinsic"
                                class="bg-white object-cover rounded-s-md rounded-md transition duration-150 ease-linear transform group-hover:scale-105"
                                style="
                                    position: absolute;
                                    inset: 0px;
                                    box-sizing: border-box;
                                    padding: 15px;
                                    border: none;
                                    margin: auto;
                                    display: block;
                                    width: 0px;
                                    height: 0px;
                                    min-width: 100%;
                                    max-width: 100%;
                                    min-height: 100%;
                                    max-height: 100%;
                                "
                            />
                        </span>
                        <div class="absolute top-3.5 md:top-5 3xl:top-7 ltr:left-3.5 rtl:right-3.5 ltr:md:left-5 rtl:md:right-5 ltr:3xl:left-7 rtl:3xl:right-7 flex flex-col gap-y-1 items-start"></div>
                    </div>
                    <div class="w-full overflow-hidden p-2 ltr:pl-0 rtl:pr-0">
                        <h2 class="truncate mb-1 font-semibold md:mb-1.5 text-sm sm:text-base md:text-sm lg:text-base xl:text-lg text-heading">{{ $product->name }}</h2>
                        <p class="text-body text-xs lg:text-sm leading-normal xl:leading-relaxed max-w-[250px] truncate">{{ $product->category->name  }}</p>
                        <div class="font-semibold text-sm sm:text-base mt-1.5 flex flex-wrap gap-x-2 md:text-base lg:text-xl md:mt-2.5 2xl:mt-3 text-heading">
                            <span class="inline-block false">${{ number_format($product->price, 2) }}</span><del class="sm:text-base font-normal text-gray-800">${{ number_format($product->original_price, 2) }}</del>
                        </div>
                    </div>
                </div>

                @endforeach

           
            </div>
        </div>
    </section> 



    <x-home.featured-products-section :products="$products"/>


<!-- Recommended Products Category Section -->
<x-home.recommended-products :products=$products/>

 <x-home.why-us-section/>

<x-home.footer-section/>



<!-- Include Swiper.js CDN -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper('.hero-swiper-container', {
            loop: true, // Enable loop mode
            autoplay: {
                delay: 5000, // Delay between slides
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade', // Optional: Use fade effect for smooth transitions
        });
    });
</script>

    <script src="{{  asset('assets/js/custom.js')  }}"></script> 

</body>

</html>