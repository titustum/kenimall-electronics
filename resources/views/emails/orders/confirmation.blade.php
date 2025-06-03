<x-layouts.email-layout>
    @slot('title')
    Order Confirmation - #{{ $order->order_number }}
    @endslot

    @php
    $color_primary = '#F97316';
    $color_text_dark = '#374151';
    @endphp

    <h1 style="font-size: 28px; text-align: center; margin-bottom: 25px; color: {{ $color_primary }};">Order
        Confirmation</h1>

    <p style="text-align: center; font-size: 18px; line-height: 1.5;">
        Thank you for your order! Your purchase from <b>{{ config('app.name') }}</b> was successful.
    </p>

    <div class="panel">
        <h2 style="font-size: 20px; color: {{ $color_primary }}; margin-bottom: 15px;">Order Details</h2>
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 1.6;">
            <li style="margin-bottom: 8px;"><strong>Order Number:</strong> <strong
                    style="color: {{ $color_primary }};">{{ $order->order_number }}</strong></li>
            <li style="margin-bottom: 8px;"><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i A')
                }}</li>
            <li style="margin-bottom: 8px;"><strong>Order Total:</strong> <strong
                    style="font-size: 18px; color: {{ $color_primary }};">AUD${{ number_format($order->total, 2)
                    }}</strong></li> {{-- Updated currency --}}
            <li style="margin-bottom: 8px;">
                <strong>Payment Status:</strong>
                <span style="display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 13px; font-weight: bold;
                    @if($order->status == 'pending') background-color: #fffbe6; color: #a16207;
                    @elseif($order->status == 'processing') background-color: #eff6ff; color: #1d4ed8;
                    @elseif($order->status == 'shipped') background-color: #f3e8ff; color: #6d28d9;
                    @elseif($order->status == 'delivered') background-color: #dcfce7; color: #15803d;
                    @else background-color: #f9fafb; color: #4b5563; @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </li>
        </ul>

        <h3 style="font-size: 18px; margin-top: 20px; margin-bottom: 10px; color: {{ $color_text_dark }};">Shipping
            Address:</h3>
        <p style="margin-bottom: 5px;">{{ $order->name }}</p>
        <p style="margin-bottom: 5px;">{{ $order->address }}</p>
        <p style="margin-bottom: 5px;">{{ $order->suburb }}, {{ $order->state }} {{ $order->postcode }}</p> {{-- New
        address line --}}
        <p style="margin-bottom: 5px;">{{ $order->country }}</p> {{-- New country --}}
        <p style="margin-bottom: 5px;">Phone: {{ $order->phone }}</p> {{-- New phone --}}
        <p style="margin-bottom: 0;">{{ $order->email }}</p>
    </div>

    <div class="panel">
        <h2 style="font-size: 20px; color: {{ $color_primary }}; margin-bottom: 15px;">Ordered Items</h2>
        <table class="custom-table" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <thead>
                <tr>
                    <th>Product</th>
                    <th style="text-align: right;">Qty</th>
                    <th style="text-align: right;">Price</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Product #' . $item->product_id }}</td>
                    <td style="text-align: right;">{{ $item->quantity }}</td>
                    <td style="text-align: right;">AUD${{ number_format($item->price, 2) }}</td> {{-- Updated currency
                    --}}
                    <td style="text-align: right;">AUD${{ number_format($item->price * $item->quantity, 2) }}</td> {{--
                    Updated currency --}}
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td style="color: {{ $color_primary }};">AUD${{ number_format($order->total, 2) }}</td> {{-- Updated
                    currency --}}
                </tr>
            </tfoot>
        </table>
    </div>

    <p style="text-align: center; margin-top: 25px;">
        We're currently preparing your order for shipment. You will receive another email with tracking information once
        your order has been dispatched.
    </p>

    <p style="text-align: center; margin-top: 25px;">
        You can also track your order status at any time:
    </p>

    <p style="text-align: center;">
        <a href="{{ route('orders.track') }}" class="button" target="_blank">Track Your Order</a>
    </p>

    <p style="text-align: center; margin-top: 25px;">
        If you have any questions, please don't hesitate to contact our support team.
    </p>

</x-layouts.email-layout>