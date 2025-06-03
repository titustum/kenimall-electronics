<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Customer/User Information
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // User who placed the order
            $table->string('name');    // Customer's full name
            $table->string('email');   // Customer's email address
            $table->string('phone')->nullable(); // Customer's phone number (nullable if not always required)

            // Australian Shipping Address Details
            $table->string('address');   // Street Address (e.g., Unit 1, 123 Main St)
            $table->string('suburb');    // Suburb (equivalent to City in many other countries)
            $table->string('state');     // State (e.g., NSW, VIC, QLD, ACT, etc.)
            $table->string('postcode');  // Postcode (4 digits in Australia)
            $table->string('country')->default('AU'); // Country, defaulting to Australia

            // Order Details
            $table->string('order_number')->unique(); // Unique, tracking-friendly order number
            $table->decimal('total', 10, 2);       // Total amount of the order (e.g., AUD)
            $table->string('status')->default('pending'); // Current status of the order (e.g., pending, paid, shipped, delivered, cancelled)

            // Payment Integration Details (e.g., Stripe)
            $table->string('payment_intent_id')->unique()->nullable(); // Stripe Payment Intent ID

            // Shipping Tracking Details
            $table->string('tracking_number')->nullable(); // Tracking number from carrier
            $table->string('carrier')->nullable();         // Shipping carrier name (e.g., Australia Post, Sendle, DHL)

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
