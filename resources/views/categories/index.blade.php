<x-custom-layout>
    <section class="py-12 mt-20 bg-white" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Shop by Category</h2>
                <p class="text-md text-gray-600 max-w-xl mx-auto">Browse our top categories and discover great products.
                </p>
            </div>

            <!-- Category Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8">
                @foreach ($categories as $index => $category)
                @php
                $delay = $index * 100;
                @endphp

                <a href="{{ route('products.index', ['category' => $category]) }}"
                    class="category-card group flex flex-col items-center bg-white hover:border-orange-600 hover:text-blue-600 focus:border-orange-600 focus:text-blue-600 border border-gray-200 rounded-2xl p-3 sm:p-4 hover:shadow-lg transition-shadow duration-300"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">

                    <!-- Image -->
                    <div class="w-full h-32 sm:h-40 mb-3 sm:mb-4 overflow-hidden rounded-xl bg-white">
                        <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }}"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                    </div>

                    <!-- Title -->
                    <h3
                        class="text-base sm:text-lg font-semibold text-gray-900 text-center group-hover:text-orange-600 transition-colors">
                        {{ $category->name }}
                    </h3>
                </a>
                @endforeach
            </div>

            <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="800">
                <a href="{{ route('products.index') }}"
                    class="inline-block px-6 py-3 bg-orange-600 text-white rounded-full text-sm font-medium hover:bg-orange-700 transition">
                    <i class="fas fa-store mr-1"></i> Browse All Products
                </a>
            </div>
        </div>
    </section>
</x-custom-layout>