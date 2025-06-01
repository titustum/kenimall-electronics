<x-custom-layout>
    <div class="max-w-3xl mx-auto p-6 mt-20">
        <h2 class="text-3xl font-bold mb-6">Checkout</h2>

        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block font-medium">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                    class="w-full mt-1 border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="email" class="block font-medium">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}"
                    class="w-full mt-1 border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="address" class="block font-medium">Shipping Address</label>
                <textarea name="address" id="address" class="w-full mt-1 border border-gray-300 rounded px-4 py-2"
                    required>{{ old('address') }}</textarea>
            </div>

            <div class="flex justify-between items-center border-t pt-4">
                <span class="text-xl font-semibold">Total:</span>
                <span class="text-2xl font-bold text-orange-600">${{ number_format($total, 2) }}</span>
            </div>

            <button type="submit"
                class="w-full bg-orange-600 text-white font-semibold py-3 rounded hover:bg-orange-700 transition">
                Place Order
            </button>
        </form>
    </div>
</x-custom-layout>