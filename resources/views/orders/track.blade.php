<x-custom-layout>
    <div class="max-w-xl mx-2 md:mx-auto p-8 mt-28 mb-8 bg-white rounded-lg shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <svg class="mx-auto h-16 w-16 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                <path d="M9 12l2 2 4-4" stroke="green" stroke-width="2" />
            </svg>
        </div>

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-md text-red-700 text-center animate-fade-in">
            {{ session('error') }}
        </div>
        @endif

        <form method="post" action="{{ route('orders.track') }}" class="space-y-6">
            @csrf
            <div>
                <label for="order_number" class="block text-lg font-semibold text-gray-700 mb-2">Order Number</label>
                <input type="text" id="order_number" name="order_number" required placeholder="e.g., #ORD-20250603-XYZW"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition duration-200 ease-in-out" />
            </div>

            <div>
                <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">
                    Email Address
                    {{-- Optional: Tooltip for explanation --}}
                    <span class="ml-1 text-gray-400 cursor-help"
                        title="We need your email to verify your order details.">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </label>
                <input type="email" id="email" name="email" required placeholder="your.email@gmail.com"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition duration-200 ease-in-out" />
            </div>

            <button type="submit"
                class="w-full bg-orange-600 text-white text-xl font-bold py-3 rounded-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out shadow-md">
                Track Order
            </button>

            <div class="text-center mt-6">
                <a href="#" class="text-orange-600 hover:underline text-md">Having trouble finding your order?</a>
            </div>
        </form>
    </div>
</x-custom-layout>