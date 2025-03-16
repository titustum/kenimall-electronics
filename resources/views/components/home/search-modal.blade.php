  <!-- Search Modal -->
  <div 
  x-show="searchModalOpen" 
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-50 flex items-center justify-center p-4"
  style="background-color: rgb(0, 0, 0, 90%);"
  @click.self="searchModalOpen = false"
>
  <div class="bg-white rounded-lg w-full max-w-md p-5">
      <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-medium">Search Products</h3>
          <button @click="searchModalOpen = false" class="text-gray-500 hover:text-gray-700">
              <i class="far fa-times"></i>
          </button>
      </div>
      <form action="#" method="GET">
          <div class="relative">
              <input 
                  type="text" 
                  name="search" 
                  id="search" 
                  placeholder="Search for products..."
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500"
                  @keydown.escape="searchModalOpen = false"
              >
              <button type="submit" class="absolute right-2 top-2.5 text-gray-400 hover:text-amber-500">
                  <i class="far fa-search"></i>
              </button>
          </div>
          <div class="mt-4">
              <h4 class="text-sm font-medium text-gray-700 mb-2">Popular searches:</h4>
              <div class="flex flex-wrap gap-2">
                  <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm">Electronics</a>
                  <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm">Smartphones</a>
                  <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm">Laptops</a>
                  <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-amber-100 rounded-full text-sm">Accessories</a>
              </div>
          </div>
      </form>
  </div>
</div>