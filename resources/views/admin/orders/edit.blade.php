<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Order: #{{ $order->order_number }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            {{-- Order Summary Section (Read-only essential details) --}}
            <div class="mb-6 pb-6 border-b border-gray-200 dark:border-neutral-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Order Summary</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Order Number</p>
                        <p class="mt-1 text-gray-900 dark:text-white font-semibold">#{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Amount</p>
                        <p class="mt-1 text-gray-900 dark:text-white font-semibold">AUD${{ number_format($order->total,
                            2) }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Customer Name</p>
                        <p class="mt-1 text-gray-900 dark:text-white">{{ $order->name }}
                            @if($order->user_id)
                            <span class="text-xs text-indigo-500 dark:text-indigo-400">(Registered User)</span>
                            @else
                            <span class="text-xs text-gray-400 dark:text-gray-500">(Guest)</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form to Update Order Status --}}
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Update Status</h3>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                class="space-y-4 mb-6 pb-6 border-b border-gray-200 dark:border-neutral-700">
                @csrf
                @method('PUT')
                <input type="hidden" name="update_field" value="status"> {{-- Hidden field to indicate status update
                --}}

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Order
                        Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('status') border-red-500 @enderror"
                        required>
                        @foreach(['pending', 'paid', 'shipped', 'delivered', 'cancelled'] as $statusOption)
                        <option value="{{ $statusOption }}" {{ old('status', $order->status) == $statusOption ?
                            'selected' : '' }}>
                            {{ ucfirst($statusOption) }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Status
                    </button>
                </div>
            </form>

            {{-- Form to Update Shipping Tracking --}}
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Update Shipping Tracking</h3>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="update_field" value="shipping_tracking"> {{-- Hidden field to indicate
                shipping tracking update --}}

                <div>
                    <label for="tracking_number"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tracking Number</label>
                    <input type="text" name="tracking_number" id="tracking_number"
                        value="{{ old('tracking_number', $order->tracking_number) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('tracking_number') border-red-500 @enderror">
                    @error('tracking_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="carrier"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Carrier</label>
                    <input type="text" name="carrier" id="carrier" value="{{ old('carrier', $order->carrier) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('carrier') border-red-500 @enderror">
                    @error('carrier')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Tracking
                    </button>
                </div>
            </form>

            {{-- Navigation/Action Buttons --}}
            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- Back to Orders List --}}
                <a href="{{ route('admin.orders.index') }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    Back to Orders
                </a>

                {{-- View Order Details --}}
                <a href="{{ route('admin.orders.show', $order) }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    View Details
                </a>

                {{-- Delete Order Button --}}
                {{-- <form action="{{ route('admin.orders.destroy', $order) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this order? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete Order
                    </button>
                </form> --}}
            </div>
        </div>

    </div>
</x-layouts.app>