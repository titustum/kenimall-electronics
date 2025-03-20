<!-- Navbar Section --> 
<nav class="bg-white shadow-md relative z-10" aria-label="Main navigation">
    <!-- Top Div for Social Media and Contact Info -->
    <div class="w-full bg-blue-600 text-white">
        <div class="flex flex-row justify-between items-center px-4 sm:px-6 py-2">
            <!-- Social Media Links (Left) -->
            <div class="hidden sm:flex flex-wrap space-x-4 sm:space-x-6 py-1 justify-center sm:justify-start">
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Facebook">
                    <i class="fab fa-facebook w-4"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Twitter">
                    <i class="fab fa-twitter w-4"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="Instagram">
                    <i class="fab fa-instagram w-4"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors duration-200" aria-label="YouTube">
                    <i class="fab fa-youtube w-4"></i>
                    <span class="sr-only">YouTube</span>
                </a>
            </div>
    
            <!-- Contact Info (Right) -->
            <div class="flex-grow flex justify-between items-center space-x-6 py-1 sm:justify-end">
                <a href="tel:1234567890" class="text-sm flex items-center hover:text-blue-200 transition-colors duration-200">
                    <i class="far fa-phone w-3 mr-2"></i>
                    <span class="">(123) 456-7890</span>
                </a>
                <a href="mailto:contact@kamarona.com" class="text-sm flex items-center hover:text-blue-200 transition-colors duration-200">
                    <i class="far fa-envelope w-3 mr-2"></i>
                    <span class="hidden sm:inline">contact@kamarona.com</span>
                </a>
            </div>
        </div>
    </div>
    

    <!-- Main Navbar Section -->
    <div class="flex items-center justify-between px-4 sm:px-6 py-4">
        <!-- Logo Section and Menu Button -->
        <div class="flex items-center space-x-2">

            <button
                @click="openOffcanvasMenu = !openOffcanvasMenu" 
                class="text-xl mr-8 cursor-pointer">
                <i class="far fa-bars"></i>
            </button>
            
            <a href="/" class="text-gray-800 text-2xl sm:text-3xl flex items-center space-x-2" aria-label="Kamarona Home">
                {{-- <i class="far fa-plug text-amber-500"></i> --}}
                <span class="font-medium hidden sm:inline font-[Righteous]">kamarona</span>
            </a>
        </div>

        <!-- Menu Section - Desktop -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="#home" class="text-gray-800 hover:text-amber-500 transition duration-300 font-medium border-b-2 border-transparent hover:border-amber-500 pb-1" aria-current="page">Home</a>
            <a href="#shop" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Categories</a>
            <a href="#deals" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Computers</a>
            <a href="#deals" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Phones</a>
            <a href="#about" class="text-gray-800 hover:text-amber-500 transition duration-300 border-b-2 border-transparent hover:border-amber-500 pb-1">Accessories</a>
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
            <button @click="openRegisterModal = true" class="p-2 text-gray-600 hover:text-amber-500 hover:bg-gray-100 rounded-full transition duration-200" aria-label="User profile">
                <i class="far fa-user w-5 h-5"></i>
            </button>
        </div>
    </div>
</nav>
 
 

