<!-- Hero Section -->
<section class="relative h-[500px] md:h-[700px]" aria-label="Welcome banner">
    <!-- Video Background with accessible alternative -->
    <div class="video-container absolute inset-0 w-full h-full">
        <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
            <source src="https://v.ftcdn.net/09/13/40/66/700_F_913406609_bQ0tZ8gAbf7BJXvQxvPR3wEF9AV7dbNm_ST.mp4" type="video/mp4">
            <!-- Fallback for browsers that don't support video -->
            <p>Your browser does not support HTML5 video.</p>
        </video>
        <!-- Image fallback for when video doesn't load -->
        <img src="https://media.istockphoto.com/id/1401701410/photo/portrait-of-salesman-helping-to-people-to-buy-a-new-digital-device-in-tech-shop.jpg?s=1024x1024&w=is&k=20&c=f0dc0cuaNwCJZIMr1fb3-G2BcRs2rIltwWkqilIer94=" alt="Electronics products showcase" class="absolute inset-0 w-full h-full object-cover hidden" aria-hidden="true">
    </div>

    <!-- Dark Overlay to make text stand out -->
    <div class="absolute inset-0" style="background-color: rgb(0, 0, 0, 80%);" aria-hidden="true"></div>

    <!-- Content inside the hero section -->
    <div class="container mx-auto h-full flex justify-center items-center relative text-center text-white px-4 sm:px-6">
        <div class="space-y-6 max-w-3xl">
            <!-- Headline -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight">
                Welcome to Kamarona
            </h1>
            <!-- Subheading -->
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl">
                Discover the best electronics at unbeatable prices.
            </p>
            <!-- CTA Button Row -->
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6 mt-8">
                <!-- Primary CTA Button - Explore Products -->
                <a href="/products" 
                class="inline-block bg-yellow-500 text-gray-800 font-bold py-3 px-8 rounded-full text-lg hover:bg-yellow-400 transition duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 focus:ring-offset-gray-900 shadow-lg transform hover:scale-105"
                aria-label="Browse all products">
                    Explore Products
                </a>

                <!-- Search Button (triggers modal) -->
                <button 
                    type="button"
                    id="searchModalButton"
                    class="inline-flex focus:text-amber-600 hover:text-amber-600 items-center justify-center border-2 
                    border-white bg-transparent text-white py-3 px-8 rounded-full text-lg 
                    font-semibold hover:bg-white hover:bg-opacity-10 
                    transition duration-300 focus:outline-none focus:ring-2 
                    focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900 shadow-lg transform hover:scale-105"
                    aria-label="Open search" 
                    @click="searchModalOpen = true"
                >
                    <!-- SVG search icon -->
                    <i class="fal fa-search"></i>
                    <span class="ml-1">Search</span>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- End of Hero Section -->