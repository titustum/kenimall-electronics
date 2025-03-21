<!-- Hero Section with Swiper -->
<section class="relative h-[300px] md:h-[600px]" aria-label="Welcome banner">
    <!-- Swiper Container -->
    <div class="hero-swiper-container relative w-full h-full">
        <!-- Swiper Wrapper (holds the slides) -->
        <div class="swiper-wrapper">

            <!-- Slide 1: Mouse, Keyboards, and Headphones -->
            <div class="swiper-slide relative h-full">
                <!-- Image Background -->
                <a href="#" class="absolute inset-0 w-full h-full z-10">
                    <img src="https://megabyte-andevfront.web.app/img/banner/banner-1.jpg" alt="Mouse, Keyboards, and Headphones" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
                </a>

                <!-- Dark Overlay to make text stand out -->
                <div class="absolute inset-0 bg-black z-0"></div>

            </div>

            <!-- Slide 2: Computers (Laptops, Desktops) -->
            <div class="swiper-slide relative h-full">
                <!-- Image Background -->
                <a href="#" class="absolute inset-0 w-full h-full z-10">
                    <img src="https://megabyte-andevfront.web.app/img/banner/banner-3.jpg" alt="Laptops and Desktops" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
                </a>

                <!-- Dark Overlay to make text stand out -->
                <div class="absolute inset-0 bg-black z-0"></div> 
            </div>

            <!-- Slide 3: Smartphones -->
            <div class="swiper-slide relative h-full">
                <!-- Image Background -->
                <a href="#" class="absolute inset-0 w-full h-full z-10">
                    <img src="https://megabyte-andevfront.web.app/img/banner/banner-2.jpg" alt="Smartphones" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
                </a>

                <!-- Dark Overlay to make text stand out -->
                <div class="absolute inset-0 bg-black z-0"></div> 
            </div>

        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next absolute top-1/2 right-4 z-10 text-white" style="transform: translateY(-50%);"></div>
        <div class="swiper-button-prev absolute top-1/2 left-4 z-10 text-white" style="transform: translateY(-50%);"></div>

        <!-- Pagination -->
        <div class="swiper-pagination absolute bottom-4 w-full text-center"></div>
    </div>
</section>
<!-- End of Hero Section -->