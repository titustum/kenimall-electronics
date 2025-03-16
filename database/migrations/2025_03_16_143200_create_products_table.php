<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade'); // Foreign key for user (added_by)
            $table->string('image_url'); // URL for the product image
            $table->string('name'); // Product name
            $table->decimal('price', 10, 2); // Price of the product
            $table->decimal('original_price', 10, 2); // Original price of the product
            $table->decimal('discount', 5, 2); // Discount percentage
            $table->decimal('rating', 3, 2)->default(0.0); // Product rating (default to 0)
            $table->integer('reviews_count')->default(0); // Reviews count (default to 0)
            $table->string('brand'); // Brand of the product
            $table->string('model'); // Model of the product
            $table->string('processor')->nullable(); // Processor information
            $table->string('ram')->nullable(); // RAM specification
            $table->string('storage')->nullable(); // Storage specification
            $table->text('description'); // Product description
            // Additional Fields for Electronics Products
            $table->string('screen_size')->nullable(); // e.g. 15.6 inches
            $table->string('resolution')->nullable(); // e.g. 1920x1080
            $table->string('ports')->nullable(); // e.g. 1x USB-C, 2x USB 3.0
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key for category
            $table->integer('stock_quantity')->default(0); // For tracking available stock
            $table->date('sale_start_date')->nullable(); // Start date of the discount sale
            $table->date('sale_end_date')->nullable(); // End date of the discount sale
            $table->json('additional_images')->nullable(); // Additional images for the product
            $table->json('features')->nullable(); // Features of the product (e.g. long battery life)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
