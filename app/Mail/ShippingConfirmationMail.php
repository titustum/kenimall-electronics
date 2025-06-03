<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order; // Make sure to import your Order model

class ShippingConfirmationMail extends Mailable 
{
    // use Queueable, SerializesModels;

    public $order;
    public $trackingNumber;
    public $carrierName;
    public $trackingUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, string $trackingNumber, string $carrierName, string $trackingUrl)
    {
        $this->order = $order;
        $this->trackingNumber = $trackingNumber;
        $this->carrierName = $carrierName;
        $this->trackingUrl = $trackingUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Order #' . $this->order->order_number . ' Has Been Shipped!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.shipping.confirmation', // This points to your new Blade view
            with: [
                'order' => $this->order,
                'trackingNumber' => $this->trackingNumber,
                'carrierName' => $this->carrierName,
                'trackingUrl' => $this->trackingUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}