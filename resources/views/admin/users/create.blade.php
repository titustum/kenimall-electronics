<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Create New User</h2>


        {{-- Get errors --}}
        @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
            <h3 class="p-2 text-red-800">{{ session('error') }}</h3>
        </div>
        @endif


        {{-- Form for creating a new user --}}

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- User Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">User
                        Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('name') border-red-500 @enderror"
                        required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- User Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                        Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('email') border-red-500 @enderror"
                        required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- User Password --}}
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('password') border-red-500 @enderror"
                        required autocomplete="new-password">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>



                {{-- Is Admin Checkbox --}}
                <div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ old('is_admin') ? 'checked'
                            : '' }}
                            class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded dark:bg-neutral-700 dark:border-neutral-600 dark:checked:bg-orange-500">
                        <label for="is_admin" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Grant Admin
                            Privileges</label>
                    </div>
                    @error('is_admin')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.users.index') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">Cancel</a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Create User
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-layouts.app>