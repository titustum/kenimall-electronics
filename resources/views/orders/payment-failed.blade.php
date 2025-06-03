<x-custom-layout>
    <div class="max-w-3xl mx-auto p-6 mt-28 mb-6 bg-white rounded shadow text-center">
        <h2 class="text-3xl font-bold mb-4 text-red-600">Payment Failed</h2>

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 rounded text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <p class="mb-6">Unfortunately, your payment was not completed successfully. Please try again or contact support
            if the issue persists.</p>

        <a href="{{ route('checkout.index') }}"
            class="inline-block px-6 py-3 bg-orange-600 text-white rounded hover:bg-orange-700 transition">
            Retry Checkout
        </a>

        <a href="{{ route('products.index') }}" class="inline-block mt-4 px-6 py-3 text-orange-600 underline">
            Continue Shopping
        </a>
    </div>
</x-custom-layout>