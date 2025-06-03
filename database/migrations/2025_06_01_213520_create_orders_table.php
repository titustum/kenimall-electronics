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
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_number')->unique(); // Tracking-friendly order number
            $table->string('payment_intent_id')->unique()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable(); // New: Phone number
            $table->string('address');
            $table->string('suburb');   // New: Suburb (previously city)
            $table->string('state');    // New: State (e.g., NSW, VIC)
            $table->string('postcode'); // New: Postcode (4 digits)
            $table->string('country')->default('AU'); // New: Country, defaulting to Australia
            $table->decimal('total', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
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
