<x-custom-layout>
    <div class="max-w-3xl mx-auto p-6 mt-28 mb-6 bg-white rounded shadow">
        <h2 class="text-3xl font-bold mb-4 text-green-600">Thank you for your order!</h2>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 rounded text-green-700">
            {{ session('success') }}
        </div>
        @endif

        <p class="mb-4">
            Your order <strong>#{{ $order->id }}</strong> has been placed successfully.
        </p>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Order Summary</h3>
            <ul class="mb-2">
                <li><strong>Name:</strong> {{ $order->name }}</li>
                <li><strong>Email:</strong> {{ $order->email }}</li>
                <li><strong>Shipping Address:</strong> {{ $order->address }}</li>
                <li><strong>Status:</strong> <span class="text-orange-600 font-semibold">{{ ucfirst($order->status)
                        }}</span></li>
                <li><strong>Placed on:</strong> {{ $order->created_at->format('M d, Y \a\t h:i A') }}</li>
            </ul>

            <h3 class="text-xl font-semibold mb-2">Ordered Items</h3>
            <table class="w-full border border-gray-300 border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 text-left">Product</th>
                        <th class="border border-gray-300 p-2 text-right">Price</th>
                        <th class="border border-gray-300 p-2 text-right">Quantity</th>
                        <th class="border border-gray-300 p-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $item->product->name ?? 'Product #' .
                            $item->product_id }}</td>
                        <td class="border border-gray-300 p-2 text-right">${{ number_format($item->price, 2) }}</td>
                        <td class="border border-gray-300 p-2 text-right">{{ $item->quantity }}</td>
                        <td class="border border-gray-300 p-2 text-right">${{ number_format($item->price *
                            $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right font-bold p-2 border border-gray-300">Total</td>
                        <td class="text-right font-bold p-2 border border-gray-300">${{ number_format($order->total, 2)
                            }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="{{ route('products.index') }}"
            class="inline-block mt-4 px-6 py-3 bg-orange-600 text-white rounded hover:bg-orange-700 transition">
            Continue Shopping
        </a>
    </div>
</x-custom-layout>