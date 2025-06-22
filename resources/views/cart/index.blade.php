<x-custom-layout>
    <div class="max-w-6xl mx-auto py-8 px-4 min-h-[70vh]">
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
            <div class="text-sm text-gray-600">
                @if(session('cart') && count(session('cart')) > 0)
                {{ count(session('cart')) }} item{{ count(session('cart')) > 1 ? 's' : '' }} in cart
                @endif
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ $errors->first() }}</p>
                </div>
            </div>
        </div>
        @endif

        @if(session('cart') && count(session('cart')) > 0)
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Desktop Table View -->
            <div class="hidden lg:block">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unit Price</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $cartTotal = 0; @endphp
                        @foreach(session('cart') as $id => $item)
                        @php
                        $itemTotal = $item['price'] * $item['quantity'];
                        $cartTotal += $itemTotal;
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors duration-200" id="cart-item-{{ $id }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-20 w-20">
                                        <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                                            class="h-20 w-20 p-2 object-contain rounded-xl shadow-sm">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class=" max-w-3xl text-base font-medium text-gray-900">
                                            {{ $item['name'] }}
                                        </p>
                                        @if(isset($item['description']))
                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($item['description'], 60) }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('cart.update', $id) }}" method="POST"
                                    class="quantity-form flex items-center justify-center space-x-2">
                                    @csrf @method('PUT')
                                    <button type="button"
                                        class="quantity-btn minus-btn p-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                        data-action="minus">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                        class="quantity-input w-16 text-center border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        min="1" max="99" required data-price="{{ $item['price'] }}"
                                        data-item-id="{{ $id }}">
                                    <button type="button"
                                        class="quantity-btn plus-btn p-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                        data-action="plus">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-lg font-medium text-gray-900">${{ number_format($item['price'], 2)
                                    }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="item-total text-lg font-bold text-orange-600" data-item-id="{{ $id }}">
                                    ${{ number_format($itemTotal, 2) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button type="submit" form="update-form-{{ $id }}"
                                        class="update-btn hidden text-blue-600 hover:text-blue-800 transition-colors text-sm font-medium">
                                        Update
                                    </button>
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST"
                                        class="inline-block remove-form">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 transition-colors p-2 rounded-full hover:bg-red-50"
                                            onclick="return confirm('Are you sure you want to remove this item?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-right text-lg font-semibold text-gray-900">
                                Subtotal:
                            </td>
                            <td colspan="2" class="px-6 py-4">
                                <span class="cart-total text-2xl font-bold text-orange-600">
                                    AUD ${{ number_format($cartTotal, 2) }}
                                </span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Mobile Card View -->
            <div class="lg:hidden">
                @php $cartTotal = 0; @endphp
                @foreach(session('cart') as $id => $item)
                @php
                $itemTotal = $item['price'] * $item['quantity'];
                $cartTotal += $itemTotal;
                @endphp
                <div class="border-b border-gray-200 p-6 mobile-cart-item" id="mobile-cart-item-{{ $id }}">
                    <div class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                                class="h-20 w-20 p-2 object-contain rounded-xl shadow-sm">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $item['name'] }}</h4>
                            <p class="text-sm text-gray-500 mb-3">Unit Price: ${{ number_format($item['price'], 2) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <form action="{{ route('cart.update', $id) }}" method="POST"
                                    class="quantity-form flex items-center space-x-2">
                                    @csrf @method('PUT')
                                    <button type="button"
                                        class="quantity-btn minus-btn p-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                        data-action="minus">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                        class="quantity-input w-16 text-center border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        min="1" max="99" required data-price="{{ $item['price'] }}"
                                        data-item-id="{{ $id }}">
                                    <button type="button"
                                        class="quantity-btn plus-btn p-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                        data-action="plus">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </form>

                                <form action="{{ route('cart.destroy', $id) }}" method="POST"
                                    class="inline-block remove-form">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition-colors p-2 rounded-full hover:bg-red-50"
                                        onclick="return confirm('Are you sure you want to remove this item?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="mt-3 text-right">
                                <span class="item-total text-lg font-bold text-orange-600" data-item-id="{{ $id }}">
                                    ${{ number_format($itemTotal, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Mobile Total -->
                <div class="p-6 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900">Total:</span>
                        <span class="cart-total text-2xl font-bold text-orange-600">
                            ${{ number_format($cartTotal, 2) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-4 sm:space-y-0">
            <a href="{{ route('products.index') ?? '#' }}"
                class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                Continue Shopping
            </a>

            <div class="md:flex grid gap-3 space-x-4">
                <form action="{{ route('cart.clear') ?? '#' }}" method="POST" class="inline-block">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="inline-flex w-full items-center px-6 py-3 border border-red-300 shadow-sm text-base font-medium rounded-lg text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
                        onclick="return confirm('Are you sure you want to clear your entire cart?')">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        Clear Cart
                    </button>
                </form>

                <a href="{{ route('checkout.index') }}"
                    class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Proceed to Checkout
                </a>
            </div>
        </div>

        @else
        <!-- Empty Cart State -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <div class="mx-auto h-32 w-32 text-gray-300 mb-6">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Your cart is empty</h3>
                <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet. Start shopping to
                    fill it up!</p>
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Start Shopping
                </a>
            </div>
        </div>
        @endif
    </div>


    @push('scripts')

    <!-- JavaScript for Enhanced Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity controls
            const quantityButtons = document.querySelectorAll('.quantity-btn');
            const quantityInputs = document.querySelectorAll('.quantity-input');
            
            // Handle quantity button clicks
            quantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.quantity-form');
                    const input = form.querySelector('.quantity-input');
                    const action = this.dataset.action;
                    let currentValue = parseInt(input.value);
                    
                    if (action === 'plus' && currentValue < 99) {
                        input.value = currentValue + 1;
                    } else if (action === 'minus' && currentValue > 1) {
                        input.value = currentValue - 1;
                    }
                    
                    // Update totals and submit form
                    updateItemTotal(input);
                    debounceSubmit(form);
                });
            });
            
            // Handle direct input changes
            quantityInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const form = this.closest('.quantity-form');
                    updateItemTotal(this);
                    debounceSubmit(form);
                });
            });
            
            // Update item total display
            function updateItemTotal(input) {
                const quantity = parseInt(input.value) || 1;
                const price = parseFloat(input.dataset.price);
                const itemId = input.dataset.itemId;
                const itemTotal = quantity * price;
                
                // Update item total displays
                const itemTotalElements = document.querySelectorAll(`[data-item-id="${itemId}"].item-total`);
                itemTotalElements.forEach(element => {
                    element.textContent = '$' + itemTotal.toFixed(2);
                });
                
                updateCartTotal();
            }
            
            // Update cart total
            function updateCartTotal() {
                let cartTotal = 0;
                const itemTotals = document.querySelectorAll('.item-total');
                
                itemTotals.forEach(element => {
                    const totalText = element.textContent.replace('$', '');
                    cartTotal += parseFloat(totalText);
                });
                
                const cartTotalElements = document.querySelectorAll('.cart-total');
                cartTotalElements.forEach(element => {
                    element.textContent = '$' + cartTotal.toFixed(2);
                });
            }
            
            // Debounced form submission
            let submitTimeout;
            function debounceSubmit(form) {
                clearTimeout(submitTimeout);
                submitTimeout = setTimeout(() => {
                    form.submit();
                }, 1000); // Submit after 1 second of inactivity
            }
            
            // Loading states for remove buttons
            const removeForms = document.querySelectorAll('.remove-form');
            removeForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button');
                    button.disabled = true;
                    button.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>';
                });
            });
        });
    </script>

    @endpush
</x-custom-layout>