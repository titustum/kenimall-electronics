@props(['categories'=>[]])


<!-- Shop by Categories Section -->
<section id="categories" class="py-16 bg-white">
    <div class="container mx-auto px-6 text-center">
        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-12">
            Shop by Categories
        </h2>

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8">
            @foreach ($categories as $category)
            <div
                class="group relative rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                <!-- Category Image -->
                <div class="p-2 md:p-6">
                    <a href="#" aria-label="{{ $category->name }} Category" class="block">
                        <img src="{{ $category->image_url }}" alt="{{$category->name  }}"
                            class="w-full h-32 lg:h-48 object-contain transition-transform duration-500 group-hover:scale-110">
                    </a>
                </div>
                <!-- Category Name -->
                <a href="#" aria-label="Go to {{ $category->name  }} category"
                    class="block py-4 text-sm md:text-base font-medium text-gray-800 px-3 hover:text-blue-500 transition duration-200 rounded-b-lg">
                    {{$category->name  }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>