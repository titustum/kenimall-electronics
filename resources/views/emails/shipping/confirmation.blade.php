<x-layouts.email-layout>
    {{-- Set the title for the email in the browser tab/client --}}
    @slot('title')
    Shipping Update for Order #{{ $order->order_number }}
    @endslot

    {{-- Define colors locally for clarity, though they come from the layout --}}
    @php
    $color_primary = '#F97316'; // A vibrant orange for your brand
    $color_text_dark = '#374151'; // Dark grey for main text
    @endphp

    <h1 style="font-size: 28px; text-align: center; margin-bottom: 25px; color: {{ $color_primary }};">
        Your Order Has BeenShipped!
    </h1>

    <p style="text-align: center; font-size: 18px; line-height: 1.5;">
        Fantastic news, <b>{{ $order->name }}</b>! Your order <b>#{{ $order->order_number }}</b> is now on its way to
        you.
    </p>

    <div class="panel">
        <h2 style="font-size: 20px; color: {{ $color_primary }}; margin-bottom: 15px;">Shipping Details</h2>
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 1.6;">
            <li style="margin-bottom: 8px;"><strong>Order Number:</strong> <strong
                    style="color: {{ $color_primary }};">{{ $order->order_number }}</strong></li>
            <li style="margin-bottom: 8px;"><strong>Tracking Number:</strong> <span
                    style="font-weight: bold; color: {{ $color_text_dark }};">{{ $trackingNumber }}</span></li>
            <li style="margin-bottom: 8px;"><strong>Carrier:</strong> {{ $carrierName }}</li>
            <li style="margin-bottom: 8px;">
                <strong>Shipping Address:</strong>
                <br>{{ $order->address }}
                <br>{{ $order->suburb }}, {{ $order->state }} {{ $order->postcode }}
                <br>{{ $order->country }}
            </li>
            @if($order->phone) {{-- Only show if phone is available --}}
            <li style="margin-bottom: 8px;"><strong>Contact Phone:</strong> {{ $order->phone }}</li>
            @endif
        </ul>

        <p style="text-align: center; margin-top: 20px;">
            You can track your package directly using the link below:
        </p>

        <p style="text-align: center;">
            <a href="{{ $trackingUrl }}" class="button" style="background-color: #e66200" target="_blank">Track Your
                Package</a>
        </p>
    </div>

    <p style="text-align: center; margin-top: 25px;">
        We'll keep you updated if there are any significant changes to your delivery.
    </p>

    <p style="text-align: center; margin-top: 25px;">
        If you have any questions, please don't hesitate to reach out to our support team.
    </p>

</x-layouts.email-layout>