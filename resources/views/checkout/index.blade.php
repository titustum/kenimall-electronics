<x-custom-layout>
    <div class="max-w-4xl mx-auto p-6 mt-20 md:mt-28 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Complete Your Order</h2>

        {{-- Session-based success/error messages --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Billing & Shipping Details Column --}}
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Shipping Information</h3>
                <form id="payment-form" method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('name') border-red-500 @enderror"
                            required autocomplete="name">
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email Address --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('email') border-red-500 @enderror"
                            required autocomplete="email">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone Number (Australian format) --}}
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" name="phone" id="phone"
                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('phone') border-red-500 @enderror"
                            placeholder="e.g. 04XX XXX XXX or +61 4XX XXX XXX"
                            pattern="^(\+?61|0)4\d{2}[ ]?\d{3}[ ]?\d{3}$|^(\+?61|0)[2-3,7-8]\d{7,8}$" {{-- Basic AU
                            phone pattern --}}
                            title="Enter a valid Australian phone number (e.g., 04XX XXX XXX or +61 4XX XXX XXX)"
                            required autocomplete="tel">
                        @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Shipping Address --}}
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Street Address <span
                                class="text-gray-500 text-xs">(e.g., Unit 1, 123 Main St)</span></label>
                        <textarea name="address" id="address" rows="3"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('address') border-red-500 @enderror"
                            required autocomplete="street-address">{{ old('address') }}</textarea>
                        @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Suburb (renamed from City) --}}
                        <div>
                            <label for="suburb" class="block text-sm font-medium text-gray-700 mb-1">Suburb</label>
                            <input type="text" name="suburb" id="suburb" value="{{ old('suburb') }}"
                                class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('suburb') border-red-500 @enderror"
                                required autocomplete="address-level2">
                            @error('suburb')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- State --}}
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State</label>
                            <select name="state" id="state"
                                class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('state') border-red-500 @enderror"
                                required autocomplete="address-level1">
                                <option value="">Select State</option>
                                <option value="ACT" {{ old('state')=='ACT' ? 'selected' : '' }}>ACT</option>
                                <option value="NSW" {{ old('state')=='NSW' ? 'selected' : '' }}>NSW</option>
                                <option value="NT" {{ old('state')=='NT' ? 'selected' : '' }}>NT</option>
                                <option value="QLD" {{ old('state')=='QLD' ? 'selected' : '' }}>QLD</option>
                                <option value="SA" {{ old('state')=='SA' ? 'selected' : '' }}>SA</option>
                                <option value="TAS" {{ old('state')=='TAS' ? 'selected' : '' }}>TAS</option>
                                <option value="VIC" {{ old('state')=='VIC' ? 'selected' : '' }}>VIC</option>
                                <option value="WA" {{ old('state')=='WA' ? 'selected' : '' }}>WA</option>
                            </select>
                            @error('state')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Postcode --}}
                    <div>
                        <label for="postcode" class="block text-sm font-medium text-gray-700 mb-1">Postcode</label>
                        <input type="text" name="postcode" id="postcode" value="{{ old('postcode') }}"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('postcode') border-red-500 @enderror"
                            required autocomplete="postal-code">
                        @error('postcode')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Country (Default to Australia) --}}
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        {{-- For a single target market, a hidden field or a disabled input is fine.
                        If international shipping, use a <select> with Australia pre-selected. --}}
                            <input type="text" name="country" id="country" value="Australia"
                                class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed"
                                readonly autocomplete="country-name">
                            <input type="hidden" name="country" value="AU"> {{-- Use 2-letter code for Stripe/backend
                            --}}
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 pt-6 border-t mt-6">Payment Details</h3>

                    {{-- Cardholder Name --}}
                    <div>
                        <label for="card-holder-name" class="block text-sm font-medium text-gray-700 mb-1">Cardholder
                            Name</label>
                        <input id="card-holder-name"
                            class="w-full border px-4 py-2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"
                            required autocomplete="cc-name">
                    </div>

                    {{-- Stripe Card Element --}}
                    <div>
                        <label for="card-element" class="block text-sm font-medium text-gray-700 mb-1">Credit or Debit
                            Card</label>
                        <div id="card-element" class="w-full px-4 py-2 p-3 border border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div id="card-errors" class="text-red-600 text-sm mt-2" role="alert"></div>
                    </div>

                    <input type="hidden" name="payment_method_id" id="payment-method-id-input">

                    <button id="card-button" type="submit"
                        class="w-full bg-orange-600 text-white font-semibold py-3 rounded-md hover:bg-orange-700 transition duration-300 ease-in-out
                                   flex items-center justify-center space-x-2 disabled:opacity-75 disabled:cursor-not-allowed" disabled> {{-- Start
                        disabled, enable once Stripe is ready --}}
                        <span id="button-text">Pay & Place Order</span>
                        <svg id="button-spinner" class="animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display: none;">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>

            {{-- Order Summary Column --}}
            <div class="md:sticky md:top-20 h-fit">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Your Order</h3>
                <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                    <ul class="divide-y divide-gray-200 mb-4">
                        @forelse($cart as $productId => $item)
                        <li class="py-3 flex justify-between items-center text-sm sm:text-base">
                            <div>
                                <p class="font-medium text-gray-800">{{ $item['name'] }}</p>
                                <p class="text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <span class="font-semibold text-gray-700">
                                AUD${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </span>
                        </li>
                        @empty
                        <li class="py-3 text-gray-600 text-center">Your cart is empty.</li>
                        @endforelse
                    </ul>

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <div class="flex justify-between items-center mb-2 text-base sm:text-lg">
                            <span class="font-medium text-gray-700">Subtotal:</span>
                            <span class="font-semibold text-gray-800">AUD${{ number_format($total, 2) }}</span>
                        </div>

                        {{-- Shipping Info --}}
                        @if(isset($shippingInfo['postage_result']))
                        <div class="flex justify-between items-center mb-2 text-base sm:text-lg">
                            <span class="font-medium text-gray-700">
                                Shipping ({{ $shippingInfo['postage_result']['service'] }}):
                            </span>
                            <span class="font-semibold text-gray-800">
                                AUD${{ number_format($shippingInfo['postage_result']['total_cost'], 2) }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-600 mb-4">
                            {{ $shippingInfo['postage_result']['delivery_time'] }}
                        </div>
                        @else
                        <div class="flex justify-between items-center mb-4 text-base sm:text-lg">
                            <span class="font-medium text-gray-700">Shipping:</span>
                            <span class="font-semibold text-gray-800">Pending</span>
                        </div>
                        @endif

                        {{-- Order Total --}}
                        @php
                        $shippingCost = isset($shippingInfo['postage_result']['total_cost']) ?
                        floatval($shippingInfo['postage_result']['total_cost']) : 0;
                        $grandTotal = $total + $shippingCost;
                        @endphp

                        <div
                            class="flex justify-between items-center text-base sm:text-xl md:text-2xl font-bold text-orange-600 border-t border-gray-300 pt-4">
                            <span>Order Total:</span>
                            <span>AUD${{ number_format($grandTotal, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();

        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a',
                },
            },
        });
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const cardHolderNameInput = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const buttonText = document.getElementById('button-text');
        const buttonSpinner = document.getElementById('button-spinner');
        const cardErrors = document.getElementById('card-errors');
        const paymentMethodIdInput = document.getElementById('payment-method-id-input');

        // Enable button once Stripe Card Element is ready
        cardElement.on('ready', function() {
            cardButton.disabled = false;
        });

        cardElement.on('change', function(event) {
            if (event.error) {
                cardErrors.textContent = event.error.message;
            } else {
                cardErrors.textContent = '';
            }
            // Only enable if complete and no errors
            cardButton.disabled = !event.complete || event.error;
        });


        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            cardButton.disabled = true;
            buttonText.textContent = 'Processing...';
            buttonSpinner.style.display = 'inline-block';
            cardErrors.textContent = '';

            // Create payment method
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderNameInput.value,
                        email: document.getElementById('email').value,
                        address: {
                            line1: document.getElementById('address').value,
                            city: document.getElementById('suburb').value, // Renamed to suburb
                            state: document.getElementById('state').value,   // New field
                            postal_code: document.getElementById('postcode').value, // New field
                            country: 'AU', // Explicitly set for Stripe
                        },
                        phone: document.getElementById('phone').value,
                    }
                }
            );

            if (error) {
                cardErrors.textContent = error.message;
                cardButton.disabled = false;
                buttonText.textContent = 'Pay & Place Order';
                buttonSpinner.style.display = 'none';
                return;
            }

            // Set paymentMethod.id to the hidden input and submit
            paymentMethodIdInput.value = paymentMethod.id;

            // Submit the form
            form.submit();
        });
    </script>
    @endpush
</x-custom-layout>