
<!-- Offcanvas Menu -->
<div
x-cloak 
x-show="openOffcanvasMenu" 
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="transform -translate-x-full opacity-0"
x-transition:enter-end="transform translate-x-0 opacity-100"
x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="transform translate-x-0 opacity-100"
x-transition:leave-end="transform -translate-x-full opacity-0"
class="fixed inset-0 bg-[rgb(0,0,0,0.9)] z-50 flex justify-start">

<!-- Offcanvas content -->
<div @click.away="openOffcanvasMenu = false" class="bg-white w-80 h-full shadow-lg p-6 overflow-y-auto w-full max-w-sm">
    <div class="flex justify-between items-center">
        <h5 class="text-xl font-semibold md:text-2xl font-[Righteous]">KAMARONA</h5>
        <button @click="openOffcanvasMenu = false" class="text-gray-500 text-2xl">&times;</button>
    </div>
    
    <!-- Main Links -->
    <div class="mt-6 space-y-4">
        <a href="/" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">Home</a>
        <a href="/account" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">My Account</a>
        <a href="/wishlist" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">Wishlist</a>
        <a href="/cart" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">Shopping Cart</a>
    </div>
 
    <!-- Categories Dropdown -->
    <div class="mt-6" x-data="{ openCategories: false }">
        <button @click="openCategories = !openCategories" class="px-4 py-2 text-gray-700 hover:bg-gray-200 rounded w-full text-left flex justify-between items-center transition">
            Categories
            <span x-show="openCategories" class="transform rotate-180 transition-transform">&#9660;</span>
            <span x-show="!openCategories" class="transform rotate-0 transition-transform">&#9654;</span>
        </button>
        <ul x-show="openCategories" 
            x-transition:enter="transition ease-out duration-200" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            class="mt-2 space-y-2 list-inside pl-4">
            @foreach($categories as $category)
                <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition flex items-center">
                    @if($category->image_url)
                        <img src="{{ $category->image_url }}" 
                            alt="{{ $category->name }} icon" 
                            class="w-8 h-8 rounded-full p-1 object-contain mr-3">
                    @endif
                    <a href="#" class="text-sm w-full truncate">
                        {{ $category->name }}
                    </a>
                </li> 
            @endforeach
        </ul>
    </div>
 

    <!-- Horizontal Line to divide -->
    <hr class="border-gray-300 my-4">

    <!-- Other Links -->
    <div class="mt-6 space-y-4">
        <a href="/faq" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">FAQ's</a>
        <a href="/contact" class="block text-gray-700 hover:bg-gray-200 py-2 px-4 rounded-md transition">Contact Us</a>
    </div>
</div>
</div>