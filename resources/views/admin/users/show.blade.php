<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">User Details: {{ $user->name }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- User Name --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">User Name</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                </div>

                {{-- User ID --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">User ID</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $user->id }}</p>
                </div>

                {{-- User Email --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $user->email }}</p>
                </div>

                {{-- User Role --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_admin ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' }}">
                            {{ $user->is_admin ? 'Admin' : 'Customer' }}
                        </span>
                    </p>
                </div>

                {{-- Created At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $user->created_at->format('M
                        d, Y H:i A') }}</p>
                </div>

                {{-- Updated At --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $user->updated_at->format('M
                        d, Y H:i A') }}</p>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- Back to Users List --}}
                <a href="{{ route('admin.users.index') }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    Back to Users
                </a>

                {{-- Edit User Button --}}
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit User
                </a>

                {{-- Delete User Button --}}
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete User
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>