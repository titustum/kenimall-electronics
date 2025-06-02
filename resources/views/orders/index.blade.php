<x-custom-layout>
    <div class="max-w-4xl mx-auto p-6 mt-20">
        <h2 class="text-3xl font-bold mb-6">My Orders</h2>

        @if($orders->isEmpty())
        <p class="text-gray-600">You have no orders yet.</p>
        <a href="{{ route('products.index') }}" class="text-orange-600 hover:underline mt-4 inline-block">
            Browse Products
        </a>
        @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 border border-gray-300 text-left">Order #</th>
                    <th class="p-3 border border-gray-300 text-left">Date</th>
                    <th class="p-3 border border-gray-300 text-left">Total</th>
                    <th class="p-3 border border-gray-300 text-left">Status</th>
                    <th class="p-3 border border-gray-300 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="p-3 border border-gray-300">{{ $order->id }}</td>
                    <td class="p-3 border border-gray-300">{{ $order->created_at->format('M d, Y') }}</td>
                    <td class="p-3 border border-gray-300 text-orange-600 font-semibold">${{
                        number_format($order->total, 2) }}</td>
                    <td class="p-3 border border-gray-300">
                        <span class="inline-block px-2 py-1 rounded text-white 
                                    {{ $order->status === 'paid' ? 'bg-green-600' : 'bg-yellow-600' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="p-3 border border-gray-300">
                        <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:underline">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $orders->links() }} {{-- pagination links --}}
        </div>
        @endif
    </div>
</x-custom-layout>