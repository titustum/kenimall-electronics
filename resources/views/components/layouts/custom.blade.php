<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800" 
        x-data="
        { 
        mobileMenuOpen: false, 
        searchModalOpen: false, 
        openRegisterModal: false 
        }">

        <x-home.navbar-section/>

        <x-home.search-modal/> 
        <x-home.register-login-modal/>
        
        {{ $slot }}

        <x-home.footer-section/>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
        <!-- Swiper JS Initialization -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 

        <script src="{{  asset('assets/js/custom.js') }}"></script>

        @fluxScripts
    </body>
</html>
