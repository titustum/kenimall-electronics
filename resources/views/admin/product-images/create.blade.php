<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Add Images to: {{ $product->name }}</h2>

        <form action="{{ route('admin.products.images.store', $product) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6 bg-white dark:bg-neutral-800 shadow rounded-lg p-6">
            @csrf

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Upload Product Images <span class="text-red-500">*</span>
                </label>
                <input type="file" name="images[]" id="images" multiple accept="image/*"
                    class="block px-5 py-3 border w-full border-gray-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white rounded-md shadow-sm focus:ring focus:ring-orange-300 focus:border-orange-500">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">You can upload multiple images (JPEG, PNG,
                    etc.)</p>

                @error('images.*')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.products.show', $product) }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white text-sm font-medium">
                    Cancel
                </a>

                <button type="submit"
                    class="inline-flex items-center px-5 py-3 bg-orange-600 text-white text-sm font-semibold rounded-md hover:bg-orange-700 transition focus:outline-none focus:ring focus:ring-orange-300">
                    <i class="fas fa-upload mr-2"></i>
                    Upload Images
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>