
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
<div @click.away="openOffcanvasMenu = false" class="bg-white w-80 h-full shadow-lg p-6 overflow-y-auto">
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

    <!-- Hardware Dropdown -->
    <div class="mt-6" x-data="{ openHardware: false }">
        <button @click="openHardware = !openHardware" class="px-4 py-2 text-gray-700 hover:bg-gray-200 rounded w-full text-left flex justify-between items-center transition">
            Hardware
            <span x-show="openHardware" class="transform rotate-180 transition-transform">&#9660;</span>
            <span x-show="!openHardware" class="transform rotate-0 transition-transform">&#9654;</span>
        </button>
        <ul x-show="openHardware" 
            x-transition:enter="transition ease-out duration-200" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            class="mt-2 space-y-2 list-inside list-disc pl-4">
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Motherboards</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Processors</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Rams</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Video Cards</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Power Supplies</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Hard Drives</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">SSD Disk</a></li>
        </ul>
    </div>

    <!-- Computers Dropdown -->
    <div class="mt-6" x-data="{ openComputers: false }">
        <button @click="openComputers = !openComputers" class="px-4 py-2 text-gray-700 hover:bg-gray-200 rounded w-full text-left flex justify-between items-center transition">
            Computers
            <span x-show="openComputers" class="transform rotate-180 transition-transform">&#9660;</span>
            <span x-show="!openComputers" class="transform rotate-0 transition-transform">&#9654;</span>
        </button>
        <ul x-show="openComputers" 
            x-transition:enter="transition ease-out duration-200" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            class="mt-2 space-y-2 list-inside list-disc pl-4">
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Notebooks</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Laptops</a></li>
            <li class="px-4 py-2 hover:bg-gray-200 text-gray-700 transition"><a href="#">Desktops</a></li>
        </ul>
    </div>

    <!-- Other links without dropdown -->
    <div class="my-6 space-y-2">
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition rounded-md">Monitors</a>
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition rounded-md">Printers</a>
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition rounded-md">Smartphones</a>
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