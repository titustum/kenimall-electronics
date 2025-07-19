<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Product Details: {{ $product->name }}</h2>


        @if (session('success'))
        <div
            class="mb-4 px-4 py-3 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 border border-green-300 dark:border-green-700 shadow">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div
            class="mb-4 px-4 py-3 rounded-md bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 border border-red-300 dark:border-red-700 shadow">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
        @endif

        {{-- Product Details --}}

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Product Name --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Product Name</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->name }}</p>
                </div>

                {{-- Product ID --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Product ID</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->id }}</p>
                </div>

                {{-- Product Model --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Model</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->model ?? 'N/A' }}
                    </p>
                </div>

                {{-- Price --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">AUD${{
                        number_format($product->price, 2) }}</p>
                </div>

                {{-- Sale Price --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sale Price</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        @if ($product->sale_price)
                        AUD${{ number_format($product->sale_price, 2) }}
                        <span class="text-xs text-green-600 dark:text-green-400 ml-2">({{
                            number_format((($product->price - $product->sale_price) / $product->price) * 100, 0) }}%
                            off)</span>
                        @else
                        N/A
                        @endif
                    </p>
                </div>

                {{-- Stock --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Stock Quantity</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{
                        number_format($product->stock) }}</p>
                </div>

                {{-- Is Featured --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Featured Product</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->is_featured ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' }}">
                            {{ $product->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </p>
                </div>

                {{-- Category --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $product->category->name ?? 'N/A' }} {{-- Assuming 'category' relationship exists --}}
                    </p>
                </div>

                {{-- Brand --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $product->brand->name ?? 'N/A' }} {{-- Assuming 'brand' relationship exists --}}
                    </p>
                </div>

                {{-- Condition --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Condition</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->condition ?? 'N/A'
                        }}</p>
                </div>

                {{-- Color --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Color</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->color ?? 'N/A' }}
                    </p>
                </div>

                {{-- Slug --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->slug }}</p>
                </div>

                {{-- Product Description (Full Width) --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300 leading-relaxed">{{ $product->description }}</p>
                </div>

                {{-- Specifications (if applicable) --}}
                @if ($product->specifications)
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Specifications</p>
                    <ul class="mt-1 text-gray-700 dark:text-gray-300 list-disc list-inside">
                        @foreach (json_decode($product->specifications, true) as $key => $value)
                        <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Features (if applicable) --}}
                @if ($product->features)
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Features</p>
                    <ul class="mt-1 text-gray-700 dark:text-gray-300 list-disc list-inside">
                        @foreach (json_decode($product->features, true) as $feature)
                        <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Product Images --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Product Images</p>

                    @if ($product->image_path || $product->images)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        {{-- Main Product Image --}}
                        @if ($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }} Image"
                            class="w-full h-auto rounded-md shadow-md border border-gray-200 dark:border-neutral-700">
                        @endif

                        {{-- Additional Images --}}
                        @if ($product->images)
                        @foreach (json_decode($product->images, true) as $image)
                        <img src="{{ Storage::url($image['image_path']) }}" alt="{{ $product->name }} Additional Image"
                            class="w-full h-auto rounded-md shadow-md border border-gray-200 dark:border-neutral-700">
                        @endforeach
                        @endif
                    </div>
                    @else
                    <p class="text-gray-600 dark:text-gray-400">No images uploaded for this product.</p>
                    @endif
                </div>

                {{-- Additional Images Link --}}
                <div class="md:col-span-2">
                    <a href="{{ route('admin.products.images.create', $product) }}"
                        class="inline-flex items-center mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow focus:outline-none focus:ring ring-blue-300 transition">
                        <i class="fas fa-image mr-2"></i>
                        Add More Images
                    </a>
                </div>


                {{-- Added By --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Added By</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $product->addedBy->name ?? 'N/A' }} {{-- Assuming 'addedBy' relationship exists --}}
                    </p>
                </div>

                {{-- Created At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{
                        $product->created_at->format('M d, Y H:i A') }}</p>
                </div>

                {{-- Updated At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{
                        $product->updated_at->format('M d, Y H:i A') }}</p>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- Back to Products List --}}
                <a href="{{ route('admin.products.index') }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    Back to Products
                </a>

                {{-- Edit Product Button --}}
                <a href="{{ route('admin.products.edit', $product) }}"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit Product
                </a>

                {{-- Delete Product Button --}}
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete Product
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>