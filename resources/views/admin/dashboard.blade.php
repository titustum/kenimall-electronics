<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h2>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div
                class="p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Sales</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">AUD${{
                            number_format($totalSales, 2) }}</h4>
                        <div class="flex items-center mt-3">
                            @if ($salesChange >= 0)
                            <span class="text-sm font-semibold text-green-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                +{{ number_format($salesChange, 2) }}%
                            </span>
                            @else
                            <span class="text-sm font-semibold text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ number_format($salesChange, 2) }}%
                            </span>
                            @endif
                            <span class="text-xs text-gray-500 ml-2 dark:text-gray-400">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full dark:bg-green-900/30">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Orders</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{ number_format($totalOrders)
                            }}</h4>
                        <div class="flex items-center mt-3">
                            @if ($ordersChange >= 0)
                            <span class="text-sm font-semibold text-green-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                +{{ number_format($ordersChange, 2) }}%
                            </span>
                            @else
                            <span class="text-sm font-semibold text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ number_format($ordersChange, 2) }}%
                            </span>
                            @endif
                            <span class="text-xs text-gray-500 ml-2 dark:text-gray-400">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full dark:bg-blue-900/30">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Customers</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{
                            number_format($totalCustomers) }}</h4>
                        <div class="flex items-center mt-3">
                            @if ($customersChange >= 0)
                            <span class="text-sm font-semibold text-green-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                +{{ number_format($customersChange, 2) }}%
                            </span>
                            @else
                            <span class="text-sm font-semibold text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ number_format($customersChange, 2) }}%
                            </span>
                            @endif
                            <span class="text-xs text-gray-500 ml-2 dark:text-gray-400">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full dark:bg-yellow-900/30">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Avg. Order Value</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">AUD${{
                            number_format($averageOrderValue, 2) }}</h4>
                        <div class="flex items-center mt-3">
                            @if ($aovChange >= 0)
                            <span class="text-sm font-semibold text-green-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                +{{ number_format($aovChange, 2) }}%
                            </span>
                            @else
                            <span class="text-sm font-semibold text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ number_format($aovChange, 2) }}%
                            </span>
                            @endif
                            <span class="text-xs text-gray-500 ml-2 dark:text-gray-400">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full dark:bg-purple-900/30">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>



            <a href="{{ route('admin.products.index') }}"
                class="block p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Products</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{
                            number_format($totalProducts) }}</h4>
                    </div>
                    <div
                        class="p-3 bg-indigo-100 rounded-full dark:bg-indigo-900/30 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800 transition-colors duration-200">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="block p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Categories</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{
                            number_format($totalCategories) }}</h4>
                    </div>
                    <div
                        class="p-3 bg-red-100 rounded-full dark:bg-red-900/30 group-hover:bg-red-200 dark:group-hover:bg-red-800 transition-colors duration-200">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.brands.index') }}"
                class="block p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Brands</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{ number_format($totalBrands)
                            }}</h4>
                    </div>
                    <div
                        class="p-3 bg-orange-100 rounded-full dark:bg-orange-900/30 group-hover:bg-orange-200 dark:group-hover:bg-orange-800 transition-colors duration-200">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h.01M3 7h.01M3 3h.01M21 7h.01M21 3h.01M17 7h.01M17 3h.01M14 7h.01M10 7h.01M10 3h.01M14 3h.01M9 12l2 2 4-4m5-4H3v10a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="block p-6 border rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300 dark:bg-neutral-800 dark:border-neutral-700 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Admins</p>
                        <h4 class="text-3xl font-bold mt-1 text-gray-900 dark:text-white">{{ number_format($totalAdmins)
                            }}</h4>
                    </div>
                    <div
                        class="p-3 bg-teal-100 rounded-full dark:bg-teal-900/30 group-hover:bg-teal-200 dark:group-hover:bg-teal-800 transition-colors duration-200">
                        <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>


        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm border sm:rounded-lg p-6 mt-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Latest Orders</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-750">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Order ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Customer
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Total
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Date
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
                        @forelse($latestOrders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                #{{ $order->order_number }} {{-- Use order_number from schema --}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $order->name }} {{-- Direct access to name column --}}
                                @if($order->user_id)
                                <span class="text-xs text-indigo-500 dark:text-indigo-400">(Registered)</span>
                                @else
                                <span class="text-xs text-gray-400 dark:text-gray-500">(Guest)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                AUD${{ number_format($order->total, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @php
                                $statusClass = '';
                                switch ($order->status) {
                                case 'pending':
                                $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30
                                dark:text-yellow-400';
                                break;
                                case 'paid':
                                $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400';
                                break;
                                case 'shipped':
                                $statusClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400';
                                break;
                                case 'delivered':
                                $statusClass = 'bg-purple-100 text-purple-800 dark:bg-purple-900/30
                                dark:text-purple-400';
                                break;
                                case 'cancelled':
                                $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400';
                                break;
                                default:
                                $statusClass = 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                                break;
                                }
                                @endphp
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $order->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                {{-- Changed to orange --}}
                                <a href="{{ route('admin.orders.show', $order) }}"
                                    class="text-orange-600 hover:text-orange-800 dark:text-orange-400 dark:hover:text-orange-300">
                                    View
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                No recent orders found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-right">
                {{-- Changed to orange --}}
                <a href="{{ route('admin.orders.index') }}"
                    class="text-orange-600 hover:text-orange-800 dark:text-orange-400 dark:hover:text-orange-300 font-medium">
                    View All Orders &rarr;
                </a>
            </div>
        </div>

    </div>
</x-layouts.app>