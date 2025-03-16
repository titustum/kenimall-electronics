<!-- Navbar Section --> 
<nav class="bg-white shadow-md relative z-10" aria-label="Main navigation">
    <!-- Top Div for Social Media and Contact Info -->
    <div class="w-full bg-blue-600 text-white">
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center px-4 sm:px-6 py-2">
            <!-- Social Media Links (Left) -->
            <div class="flex space-x-4 py-1">
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Facebook">
                    <i class="fab fa-facebook w-4 h-4"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Twitter">
                    <i class="fab fa-twitter w-4 h-4"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Instagram">
                    <i class="fab fa-instagram w-4 h-4"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="YouTube">
                    <i class="fab fa-youtube w-4 h-4"></i>
                    <span class="sr-only">YouTube</span>
                </a>
            </div>

            <!-- Contact Info (Right) -->
            <div class="flex space-x-6 py-1">
                <a href="tel:1234567890" class="text-sm flex items-center hover:text-blue-200 transition-colors duration-200">
                    <i class="far fa-phone w-3 h-3 mr-2"></i>
                    <span class="hidden sm:inline">(123) 456-7890</span>
                </a>
                <a href="mailto:contact@kamarona.com" class="text-sm flex items-center hover:text-blue-200 transition-colors duration-200">
                    <i class="far fa-envelope w-3 h-3 mr-2"></i>
                    <span class="hidden sm:inline">contact@kamarona.com</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navbar Section -->
    <div class="container mx-auto flex items-center justify-between px-4 sm:px-6 py-4">
        <!-- Logo Section -->
        <div class="flex items-center space-x-2">
            <a href="/" class="text-gray-800 text-2xl sm:text-3xl flex items-center space-x-2" aria-label="Kamarona Home">
                <i class="far fa-plug"></i>
                <span class="font-medium hidden sm:inline font-[Righteous]">kamarona</span>
            </a>
        </div>

        <!-- Menu Section - Desktop -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="#home" class="text-gray-800 hover:text-amber-500 transition duration-300 font-medium border-b-2 border-transparent hover:border-amber-500 pb-1" aria-current="page">Home</a>
            <a href="#shop" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Shop</a>
            <a href="#deals" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Deals</a>
            <a href="#about" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">About</a>
            <a href="#contact" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Contact</a>
        </div>

        <!-- Action Items: Search, Cart, User -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <!-- Search Button (triggers modal) -->
            <button
                type="button"
                @click="searchModalOpen = true"
                class="p-2 text-gray-600 hover:text-amber-500 hover:bg-gray-100 rounded-full transition duration-200"
                aria-label="Search products"
            >
                <i class="far fa-search w-5 h-5"></i>
            </button>

            <!-- Cart Icon with Badge -->
            <a href="#cart" class="relative p-2 text-gray-600 hover:text-amber-500 hover:bg-gray-100 rounded-full transition duration-200" aria-label="Shopping cart with 3 items">
                <i class="far fa-shopping-cart w-5 h-5"></i>
                <span class="absolute -top-1 -right-1 text-xs bg-amber-500 text-white rounded-full w-5 h-5 flex items-center justify-center font-medium">3</span>
            </a>

            <!-- User Profile Icon -->
            <a href="#profile" class="p-2 text-gray-600 hover:text-amber-500 hover:bg-gray-100 rounded-full transition duration-200" aria-label="User profile">
                <i class="far fa-user w-5 h-5"></i>
            </a>

            <!-- Mobile Menu Toggle -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 text-gray-600 hover:text-amber-500 hover:bg-gray-100 rounded-full transition duration-200"
                aria-label="Toggle menu"
                :aria-expanded="mobileMenuOpen"
            >
                <i x-show="!mobileMenuOpen" class="far fa-bars w-6 h-6"></i>
                <i x-show="mobileMenuOpen" class="far fa-times w-6 h-6"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) -->
<div 
    x-show="mobileMenuOpen" 
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform -translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-4"
    class="lg:hidden bg-white shadow-lg px-4 py-4 absolute w-full z-20"
>
    <nav class="space-y-3">
        <a href="#home" class="block text-gray-800 hover:text-amber-500 hover:bg-gray-50 px-3 py-2 rounded-md transition duration-200 font-medium" aria-current="page">
            <i class="far fa-home mr-2"></i>Home
        </a>
        <a href="#shop" class="block text-gray-800 hover:text-amber-500 hover:bg-gray-50 px-3 py-2 rounded-md transition duration-200">
            <i class="far fa-store mr-2"></i>Shop
        </a>
        <a href="#deals" class="block text-gray-800 hover:text-amber-500 hover:bg-gray-50 px-3 py-2 rounded-md transition duration-200">
            <i class="far fa-tag mr-2"></i>Deals
        </a>
        <a href="#about" class="block text-gray-800 hover:text-amber-500 hover:bg-gray-50 px-3 py-2 rounded-md transition duration-200">
            <i class="far fa-info-circle mr-2"></i>About
        </a>
        <a href="#contact" class="block text-gray-800 hover:text-amber-500 hover:bg-gray-50 px-3 py-2 rounded-md transition duration-200">
            <i class="far fa-envelope mr-2"></i>Contact
        </a>
    </nav>
</div>
