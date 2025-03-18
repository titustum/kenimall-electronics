@props(['products'=>[]])
   
   
   <!-- section -->
   <section class="bg-blue-50 bg-opacity-50 to-white py-14">
    <div class="container mx-auto px-6">
        <!-- row --> 
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-2">Top Selling Products</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Discover Your Ideal Product
            </h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Uncover the perfect items tailored to fit your lifestyle. Whether you're looking for a powerful work tool, a device for relaxation, or something for everyday use, we have a wide selection to suit all your needs.
            </p>
        </div> 
        

        <div class="swiper-container swiper pt-20" id="swiper-1" data-pagination-type="" data-speed="1600"
            data-space-between="20" data-pagination="false" data-navigation="true" data-autoplay="true"
            data-autoplay-delay="6000" data-effect="slide"
            data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 4}, "1424": {"slidesPerView": 5}}'>
            <div class="swiper-wrapper">




            @foreach ($products as $product)
                <div class="swiper-slide">
                    <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
                        <div class="flex-auto p-4">
                            <div class="text-center relative flex justify-center">
                                <div class="absolute top-0 left-0 z-10">

                                    @if ($product->discount > 0)
                                        <span class="inline-block px-2 py-1 rounded-md text-center font-semibold text-sm align-baseline 
                                        leading-none bg-red-500 text-white">{{ round($product->discount) }}% off
                                        </span>
                                    @endif
                                </div>
                                <a href="#!">
                                    <!-- Image with Zoom Effect on Hover -->
                                    <div class="relative group">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="w-full p-4 h-32 lg:h-48 transition-transform duration-300 transform group-hover:scale-110" />
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-col gap-3">
                                <a href="#!" class="text-decoration-none text-gray-500 truncate"><small> {{ $product->category->name }}</small></a>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-base truncate"><a href="./shop-single.html">{{ $product->name }}</a></h3>
                                    <div class="flex items-center">
                                        <div class="flex flex-row gap-3">
                                            <!-- Rating Stars -->
                                            <div class="flex items-center mb-3">
                                                <div class="flex text-yellow-400 small">
                                                    @for ($i = 1; $i <= 5; $i++) 
                                                        @if ($i <=floor($product->rating)) 
                                                            <i class="fa-solid fa-star"></i>
                                                        @elseif ($i - 0.5 <= $product->rating) 
                                                            <i class="fa-solid fa-star-half-alt"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="text-xs text-gray-500 ml-2">({{ $product->reviews_count }} reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-900 font-semibold">${{ $product->price }}</span>
                                        <span class="line-through text-gray-500">${{ $product->original_price }}</span>
                                    </div>
                                    <div>
                                        <!-- Wishlist Button -->
                                        <button class="relative py-2 px-3 rounded-full shadow-md bg-gray-200 hover:bg-red-100 transition-colors duration-200 focus:outline-none group">
                                            <i class="fal fa-heart text-gray-400 group-hover:text-red-500 transition-colors duration-300"></i>
                                            <!-- Heart Icon Fill Animation -->
                                            <div class="absolute top-0 left-0 right-0 bottom-0 bg-red-500 opacity-0 group-hover:opacity-30 rounded-full transition-opacity duration-300"></div>
                                        </button>
                                    </div>
                                </div>

                                <!-- CTA Buttons -->
                                <div class="flex space-x-2 mt-auto">
                                    <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-sm text-center transition-colors duration-200 shadow-sm">
                                        Add <span class="hidden xl:inline">to Cart</span> 
                                        <i class="far fa-shopping-cart ml-2"></i>
                                    </a>
                                    <a href="{{ route('products.show', $product->id) }}" class="bg-blue-50 hover:bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

     



                <!-- Add more slides as needed -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-navigation">
                <div class="swiper-button-next top-[40px]"></div>
                <div class="swiper-button-prev top-[40px] !right-0 !left-auto mx-10"></div>
            </div>
        </div>
    </div>
</section>