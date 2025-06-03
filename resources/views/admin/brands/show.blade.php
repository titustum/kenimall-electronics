<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Brand Details: {{ $brand->name }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Brand Name --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand Name</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $brand->name }}</p>
                </div>

                {{-- Brand ID --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand ID</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $brand->id }}</p>
                </div>

                {{-- Added By --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Added By</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $brand->addedBy->name ?? 'N/A' }} {{-- Assuming 'addedBy' relationship exists --}}
                    </p>
                </div>

                {{-- Created At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $brand->created_at->format('M
                        d, Y H:i A') }}</p>
                </div>

                {{-- Updated At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $brand->updated_at->format('M
                        d, Y H:i A') }}</p>
                </div>

                {{-- Brand Logo --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Brand Logo</p>
                    @if ($brand->image_path)
                    <img src="{{ Storage::url($brand->image_path) }}" alt="{{ $brand->name }} Logo"
                        class="max-w-xs h-auto rounded-md shadow-md border border-gray-200 dark:border-neutral-700">
                    @else
                    <p class="text-gray-600 dark:text-gray-400">No logo uploaded for this brand.</p>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- Back to Brands List --}}
                <a href="{{ route('admin.brands.index') }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    Back to Brands
                </a>

                {{-- Edit Brand Button --}}
                <a href="{{ route('admin.brands.edit', $brand) }}"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit Brand
                </a>

                {{-- Delete Brand Button --}}
                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this brand? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete Brand
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>