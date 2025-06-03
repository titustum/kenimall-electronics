<x-custom-layout>
    <section class="py-12 mt-20 bg-white" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Shop by Category</h2>
                <p class="text-md text-gray-600 max-w-xl mx-auto">Browse our top categories and discover great products.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $index => $category)
                @php
                $imageUrl = Storage::exists($category->image_path)
                ? Storage::url($category->image_path)
                : $category->image_path;
                $delay = $index * 75;
                @endphp

                <a href="{{ route('products.index', ['category' => $category]) }}"
                    class="group bg-gray-50 border border-gray-200 rounded-xl p-4 flex flex-col items-center text-center hover:shadow-md transition"
                    data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class="w-full h-36 overflow-hidden rounded-lg mb-3">
                        <img src="{{ $imageUrl }}" alt="{{ $category->name }}"
                            class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600">
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