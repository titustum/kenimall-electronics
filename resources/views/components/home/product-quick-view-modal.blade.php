<!-- Quick View Modal -->
<div 
    x-cloak 
    x-show="quickViewModal"  
    @click.self="quickViewModal = false"
    class="fixed inset-0 bg-[rgba(0,0,0,0.8)] z-50 flex justify-center items-center p-6"
    >
        <div class="bg-white rounded-lg shadow-lg h-full lg:h-auto w-full max-w-2xl p-6 relative overflow-auto">
            <button @click="quickViewModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <i class="fas fa-times"></i>
            </button>

            <!-- Product Details -->
            <div class="flex flex-col md:flex-row" x-show="product !== null">
                <!-- Product Image -->
                <div class="w-full md:w-1/3">
                    <img :src="product ? product.image_url : ''" :alt="product ? product.name : ''" class="w-full h-auto object-contain">
                </div>
                <!-- Product Info -->
                <div class="w-full md:w-2/3 md:pl-6 mt-4 md:mt-0">
                    <h3 class="text-xl font-semibold text-gray-800" x-text="product ? product.name : ''"></h3>
                    <p class="text-gray-500 mt-2" x-text="product && product.description ? product.description : ''"></p>
                    
                    <!-- Rating Stars -->
                    <div class="flex items-center my-3">
                        <div class="flex text-amber-400">
                            <template x-for="i in 5">
                                <span>
                                    <i x-show="product && i <= Math.floor(product.rating)" class="fas fa-star"></i>
                                    <i x-show="product && i > Math.floor(product.rating) && i - 0.5 <= product.rating" class="fas fa-star-half-alt"></i>
                                    <i x-show="product && i > product.rating" class="far fa-star"></i>
                                </span>
                            </template>
                        </div>
                        <span class="text-xs text-gray-500 ml-2" x-text="product ? `(${product.reviews_count} reviews)` : ''"></span>
                    </div>
                    
                    <!-- Price -->
                    <div>
                        <span x-show="product && product.original_price" class="text-sm text-gray-500 line-through mr-2" 
                                x-text="product && product.original_price ? `$${Number(product.original_price).toFixed(2)}` : ''"></span>
                        <span class="text-xl font-bold text-gray-800" 
                                x-text="product ? `$${Number(product.price).toFixed(2)}` : ''"></span>
                    </div>

                    <!-- Product Specs -->
                    <div class="mt-4 text-gray-700">
                        <p><strong>Brand:</strong> <span x-text="product ? product.brand : ''"></span></p>
                        <p><strong>Model:</strong> <span x-text="product && product.model ? product.model : ''"></span></p>
                        <p><strong>Processor:</strong> <span x-text="product ? product.processor : ''"></span></p>
                        <p><strong>RAM:</strong> <span x-text="product ? product.ram : ''"></span></p>
                        <p><strong>Storage:</strong> <span x-text="product ? product.storage : ''"></span></p>
                    </div>

                    <div class="flex mt-6 space-x-4">
                        <a href="#"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200 shadow-sm">
                            Add to Cart
                        </a>
                        <!-- View Details Button -->
                        <a :href="'{{ route('products.show', '') }}/' + product.id"
                                class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
