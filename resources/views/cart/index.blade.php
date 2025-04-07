<x-custom-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

        @if($cartItems->isEmpty())
        <p class="text-gray-500">Your cart is empty. Start shopping!</p>
        @else
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Product</th>
                    <th class="border p-2">Quantity</th>
                    <th class="border p-2">Price</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td class="border p-2">{{ $item->product->name }}</td>
                    <td class="border p-2">{{ $item->quantity }}</td>
                    <td class="border p-2">${{ $item->price }}</td>
                    <td class="border p-2">
                        <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</x-custom-layout>