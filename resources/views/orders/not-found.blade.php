<x-custom-layout>
    <div class="max-w-3xl mx-auto p-6 mt-28 mb-6 bg-white rounded shadow text-center">
        <h2 class="text-3xl font-bold mb-4 text-red-600">Order Not Found</h2>

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 rounded text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <p class="mb-6">We couldn't find the order you're looking for. Please check your order number or contact support
            for assistance.</p>

        <a href="{{ route('products.index') }}"
            class="inline-block px-6 py-3 bg-orange-600 text-white rounded hover:bg-orange-700 transition">
            Continue Shopping
        </a>
    </div>
</x-custom-layout>