<x-custom-layout>
    <div class="max-w-4xl mx-2 md:mx-auto p-8 mt-28 mb-8 bg-white rounded-lg shadow-xl border border-gray-100">

        <div class="text-center mb-8">
            {{-- Success Icon --}}
            <svg class="mx-auto h-20 w-20 text-green-500 mb-4 animate-scale-in" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-4xl font-extrabold text-gray-800 mb-2">Thank you for your order!</h2>
            <p class="text-gray-600 text-lg">Your purchase was successful.</p>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-md text-green-700 text-center animate-fade-in">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-indigo-50 p-6 rounded-lg mb-8 border border-indigo-100">
            <p class="text-xl font-medium text-gray-800 mb-2">
                Your order number is: <strong class="text-indigo-700 select-all tracking-wide text-2xl">{{
                    $order->order_number }}</strong>
            </p>
            <p class="text-gray-600">
                You'll receive an email shortly with your order confirmation and tracking details.
            </p>
        </div>

        {{-- Order Summary Section --}}
        <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 border-gray-200">Order Summary</h3>
            <ul class="space-y-3 text-lg text-gray-700">
                <li><strong>Name:</strong> {{ $order->name }}</li>
                <li><strong>Email:</strong> {{ $order->email }}</li>
                <li><strong>Shipping Address:</strong> {{ $order->address }}</li>
                <li>
                    <strong>Status:</strong>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                 @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                 @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                 @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                 @elseif($order->status == 'delivered') bg-green-100 text-green-800
                                 @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </li>
                <li><strong>Placed on:</strong> {{ $order->created_at->format('M d, Y \a\t h:i A') }}</li>
            </ul>
        </div>

        {{-- Ordered Items Section --}}
        <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 border-gray-200">Ordered Items</h3>
            <div class="overflow-x-auto"> {{-- Add this for horizontal scrolling on small screens --}}
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left border-b border-gray-300">Product</th>
                            <th class="py-3 px-6 text-right border-b border-gray-300">Price</th>
                            <th class="py-3 px-6 text-right border-b border-gray-300">Quantity</th>
                            <th class="py-3 px-6 text-right border-b border-gray-300">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($order->items as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 {{ $loop->even ? 'bg-gray-50' : '' }}">
                            {{-- Zebra stripes --}}
                            <td class="py-3 px-6 text-left">{{ $item->product->name ?? 'Product #' .
                                $item->product_id }}</td>
                            <td class="py-3 px-6 text-right">${{ number_format($item->price, 2) }}</td>
                            <td class="py-3 px-6 text-right">{{ $item->quantity }}</td>
                            <td class="py-3 px-6 text-right">${{ number_format($item->price * $item->quantity, 2) }}
                            </td>
                        </tr>
                        @endforeach
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            {{-- Zebra stripes --}}
                            <td class="py-3 px-6 text-left" colspan="3">Shipping cost:</td>
                            <td class="py-3 px-6 text-right">${{ number_format(($order->total)-($item->price *
                                $item->quantity), 2) }}</td>
                        </tr>

                        {{-- Handle case where there are no items, though unlikely for an order --}}
                        @if($order->items->isEmpty())
                        <tr>
                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">No items found for this order.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="text-gray-800 text-base font-bold bg-gray-100">
                            <td colspan="3" class="py-3 px-6 text-right">Total Paid</td>
                            <td class="py-3 px-6 text-right">AUD ${{ number_format($order->total, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
            <a href="{{ route('orders.track-form') }}"
                class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-orange-700 bg-orange-100 hover:bg-orange-200 transition duration-200 ease-in-out shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                    <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" />
                </svg>
                Track Your Order
            </a>

            <a href="{{ route('products.index') }}"
                class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 transition duration-200 ease-in-out shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Continue Shopping
                <svg class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

    </div>
</x-custom-layout>

@push('styles')
<style>
    /* Optional: Add a simple fade-in animation for the success message */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    /* Optional: Add a subtle scale-in animation for the success icon */
    @keyframes scaleIn {
        from {
            transform: scale(0.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .animate-scale-in {
        animation: scaleIn 0.4s ease-out forwards;
    }
</style>
@endpush