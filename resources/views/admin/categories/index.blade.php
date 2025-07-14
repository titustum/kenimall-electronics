<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Categories Management</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">All Categories</h3>
                <a href="{{ route('admin.categories.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Add New Category
                </a>
            </div>

            @if($categories->isEmpty())
            <p class="text-gray-600 dark:text-gray-400">No categories found. Start by adding one!</p>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-750">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $category->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.categories.show', $category) }}"
                                    class="text-orange-600 hover:text-orange-800 dark:text-orange-400 dark:hover:text-orange-300">
                                    View
                                </a>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 ml-3">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                    class="inline-block ml-3"
                                    onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="mt-4">
                {{ $categories->links() }}
            </div> --}}

            @endif
        </div>

    </div>
</x-layouts.app>