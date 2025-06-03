<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Category: {{ $category->name }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Use PUT method for updates in Laravel resource controllers --}}

                {{-- Category Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category
                        Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('name') border-red-500 @enderror"
                        required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug (Auto-generated or editable) --}}
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Slug (SEO
                        Friendly URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('slug') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave blank to auto-generate from category
                        name.</p>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category Image --}}
                <div>
                    <label for="image_path"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category Image</label>
                    <input type="file" name="image_path" id="image_path"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('image_path') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload a new image to replace the current
                        one. Leave blank to keep existing.</p>
                    @error('image_path')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    @if ($category->image_path)
                    <div class="mt-4">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Image:</p>
                        <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }} Image"
                            class="max-w-xs h-auto rounded-md shadow-md border border-gray-200 dark:border-neutral-700">
                    </div>
                    @endif
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.categories.index') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">Cancel</a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Category
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- View Category Details --}}
                <a href="{{ route('admin.categories.show', $category) }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    View Details
                </a>

                {{-- Delete Category Button --}}
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete Category
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>