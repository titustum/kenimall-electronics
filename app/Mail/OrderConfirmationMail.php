<?php

namespace App\Mail;

use App\Models\Order; // Make sure to import your Order model 
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope; 

class OrderConfirmationMail extends Mailable // implements ShouldQueue // Implement ShouldQueue for better performance
{
    // use Queueable, SerializesModels;

    public Order $order;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Order #' . $this->order->order_number . ' Confirmation',
            // You can also set a 'from' address if it's different from your .env MAIL_FROM_ADDRESS
            // from: new Address('no-reply@yourstore.com', 'Your Store Name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.orders.confirmation', // This points to your Blade Markdown template
            with: [
                'order' => $this->order,
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
        return []; // Add attachments here if needed, e.g., an invoice PDF
    }
}