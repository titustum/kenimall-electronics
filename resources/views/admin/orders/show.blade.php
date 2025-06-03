<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Order Details: #{{ $order->order_number }}
        </h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Order Number --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Order Number</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">#{{ $order->order_number }}</p>
                </div>

                {{-- Order ID --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Internal Order ID</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $order->id }}</p>
                </div>

                {{-- Total Amount --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Amount</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">AUD${{
                        number_format($order->total, 2) }}</p>
                </div>

                {{-- Order Status --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                    <div class="flex items-center gap-2 mt-1">
                        @php
                        $statusClass = '';
                        switch ($order->status) {
                        case 'pending':
                        $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400';
                        break;
                        case 'paid':
                        $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400';
                        break;
                        case 'shipped':
                        $statusClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400';
                        break;
                        case 'delivered':
                        $statusClass = 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400';
                        break;
                        case 'cancelled':
                        $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400';
                        break;
                        default:
                        $statusClass = 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                        break;
                        }
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                            {{ ucfirst($order->status) }}
                        </span>

                        {{-- Form to update status --}}
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                            class="flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="update_field" value="status"> {{-- Hidden field to indicate
                            status update --}}
                            <select name="status" id="order_status"
                                class="border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white text-sm">
                                @foreach(['pending', 'paid', 'shipped', 'delivered', 'cancelled'] as $statusOption)
                                <option value="{{ $statusOption }}" {{ $order->status == $statusOption ? 'selected' : ''
                                    }}>
                                    {{ ucfirst($statusOption) }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Customer Information --}}
                <div class="md:col-span-2 border-t border-gray-200 dark:border-neutral-700 pt-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Customer Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->name }}
                                @if($order->user_id)
                                <span class="text-xs text-indigo-500 dark:text-indigo-400">(Registered User)</span>
                                @else
                                <span class="text-xs text-gray-400 dark:text-gray-500">(Guest)</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->phone ?? 'N/A' }}</p>
                        </div>
                        @if($order->user_id)
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Registered User ID</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->user_id }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Shipping Address --}}
                <div class="md:col-span-2 border-t border-gray-200 dark:border-neutral-700 pt-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Shipping Address</h3>
                    <address class="not-italic text-gray-700 dark:text-gray-300">
                        {{ $order->address }}<br>
                        {{ $order->suburb }}, {{ $order->state }} {{ $order->postcode }}<br>
                        {{ $order->country }}
                    </address>
                </div>

                {{-- Payment Details --}}
                <div class="md:col-span-2 border-t border-gray-200 dark:border-neutral-700 pt-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Payment Details</h3>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Payment Intent ID</p>
                        <p class="mt-1 text-gray-900 dark:text-white">{{ $order->payment_intent_id ?? 'N/A' }}</p>
                    </div>
                </div>

                {{-- Shipping Tracking --}}
                <div class="md:col-span-2 border-t border-gray-200 dark:border-neutral-700 pt-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Shipping Tracking</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tracking Number</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->tracking_number ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Carrier</p>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $order->carrier ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Timestamps --}}
                <div class="md:col-span-2 border-t border-gray-200 dark:border-neutral-700 pt-6 mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Order Placed At</p>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{
                                $order->created_at->format('M d, Y H:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated At</p>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{
                                $order->updated_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- Back to Orders List --}}
                <a href="{{ route('admin.orders.index') }}"
                    class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    Back to Orders
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