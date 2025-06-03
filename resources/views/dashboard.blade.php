<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h2>

        <!-- Key Metrics Cards with Improved Visual Design -->
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



        <!-- Product Table with Enhanced Features -->
        <div class="rounded-xl border border-neutral-200 overflow-hidden dark:border-neutral-700">
            <div class="bg-white dark:bg-neutral-800">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Product Inventory</h3>
                        <div class="flex gap-3">
                            <button
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition dark:bg-neutral-700 dark:text-white dark:hover:bg-neutral-600">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Export
                            </button>
                            <a href="{{ route('products.create') }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Product
                            </a>
                        </div>
                    </div>

                    <!-- Filters Row -->
                    <div class="flex flex-col sm:flex-row gap-3 mb-4">
                        <select
                            class="px-3 py-2 rounded-lg border border-gray-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white">
                            <option>All Categories</option>
                            <option>Electronics</option>
                            <option>Clothing</option>
                            <option>Home & Kitchen</option>
                        </select>
                        <select
                            class="px-3 py-2 rounded-lg border border-gray-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white">
                            <option>All Status</option>
                            <option>In Stock</option>
                            <option>Low Stock</option>
                            <option>Out of Stock</option>
                        </select>
                        <select
                            class="px-3 py-2 rounded-lg border border-gray-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white">
                            <option>Sort By: Newest</option>
                            <option>Price: High to Low</option>
                            <option>Price: Low to High</option>
                            <option>Name: A to Z</option>
                        </select>
                    </div>

                    <!-- Enhanced Product Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-750">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        <div class="flex items-center">
                                            Product
                                            <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        Category
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        <div class="flex items-center">
                                            Price
                                            <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        <div class="flex items-center">
                                            Stock
                                            <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                                <!-- Product rows -->
                                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-750 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center dark:bg-neutral-700">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                    Smartphone XYZ</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">#PRD-12345</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">Electronics</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        $799.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">120
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">In
                                            Stock</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</button>
                                        <button
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-750 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center dark:bg-neutral-700">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">Laptop
                                                    Pro</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">#PRD-12346</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">Electronics</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        $1,249.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">45
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">In
                                            Stock</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</button>
                                        <button
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-750 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center dark:bg-neutral-700">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">Smart
                                                    Watch</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">#PRD-12347</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">Electronics</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        $349.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">8</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">Low
                                            Stock</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</button>
                                        <button
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between px-2 py-3 mt-4">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <button
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:hover:bg-neutral-600">
                                Previous
                            </button>
                            <button
                                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:hover:bg-neutral-600">
                                Next
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>