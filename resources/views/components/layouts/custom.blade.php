<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-gray-50 font-[Roboto]" 
x-data="
{ 
mobileMenuOpen: false, 
searchModalOpen: false, 
openOffcanvasMenu: false,
activeDropdown: null,
openModal(productData) {
    this.product = productData;
    this.quickViewModal = true;
},
quickViewModal: false, 
product: {
        id: 1
    },
}">
 
        <x-home.navbar-section/> 
        <x-off-canvas-menu/>
        <x-home.search-modal/>  
        
        {{ $slot }}



        <x-home.footer-section />

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 

        <!-- Include Swiper.js CDN --> 
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

        @fluxScripts


        
    </body>
</html>
