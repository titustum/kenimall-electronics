<!-- Search Modal -->
<div 
  x-cloak 
  x-show="searchModalOpen" 
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[rgba(0,0,0,0.8)]" 
  @click.self="searchModalOpen = false"
  @keydown.escape="searchModalOpen = false"
>
  <div class="bg-white rounded-lg w-full h-auto max-w-lg p-5 overflow-auto shadow-lg transform transition-all ease-out duration-300 scale-95 sm:max-w-xl">
    <!-- Modal Header with Close Button -->
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold text-gray-900">Search Products</h3>
      <button 
        @click="searchModalOpen = false" 
        class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
        <i class="far fa-times text-lg"></i>
      </button>
    </div>

    <!-- Search Form -->
    <form action="#" method="GET">
      <div class="relative">
        <!-- Search Input -->
        <input 
          type="text" 
          name="search" 
          id="search" 
          placeholder="Search for products..."
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors duration-200 ease-in-out"
        >
        <!-- Search Button -->
        <button 
          type="submit" 
          class="absolute right-2 top-2.5 text-gray-400 hover:text-amber-500 transition-colors duration-200">
          <i class="far fa-search text-lg"></i>
        </button>
      </div>

      <!-- Popular Searches Section -->
      <div class="mt-6">
        <h4 class="text-sm font-medium text-gray-700 mb-2">Popular searches:</h4>
        <div class="flex flex-wrap gap-2">
          <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm transition-colors duration-200">Electronics</a>
          <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm transition-colors duration-200">Smartphones</a>
          <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm transition-colors duration-200">Laptops</a>
          <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm transition-colors duration-200">Accessories</a>
        </div>
      </div>
    </form>
  </div>
</div>
