<x-custom-layout>
    <div class="max-w-3xl mx-auto p-6 mt-20">
        <h2 class="text-3xl font-bold mb-6">Checkout</h2>

        <form id="payment-form" method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
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

            <div>
                <label for="card-holder-name" class="block font-medium">Cardholder Name</label>
                <input id="card-holder-name" class="w-full mt-1 border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="card-element" class="block font-medium">Credit or Debit Card</label>
                <div id="card-element" class="w-full mt-1 p-3 border border-gray-300 rounded"></div>
                <div id="card-errors" class="text-red-600 mt-2" role="alert"></div>
            </div>

            <div class="flex justify-between items-center border-t pt-4">
                <span class="text-xl font-semibold">Total:</span>
                <span class="text-2xl font-bold text-orange-600">${{ number_format($total, 2) }}</span>
            </div>

            <button id="card-button" type="submit"
                class="w-full bg-orange-600 text-white font-semibold py-3 rounded hover:bg-orange-700 transition">
                Pay & Place Order
            </button>
        </form>
    </div>

    @push('scripts')


    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();

        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const cardErrors = document.getElementById('card-errors');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            cardButton.disabled = true;
            cardErrors.textContent = '';

            // Create payment method
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                cardErrors.textContent = error.message;
                cardButton.disabled = false;
                return;
            }

            // Append paymentMethod.id to form and submit
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'payment_method_id';
            hiddenInput.value = paymentMethod.id;
            form.appendChild(hiddenInput);

            form.submit();
        });
    </script>

    @endpush
</x-custom-layout>