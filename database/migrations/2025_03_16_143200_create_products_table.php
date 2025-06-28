<?php

use App\Models\User;
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
            $table->id();
            $table->string('name');  // Name of the product (e.g., "Samsung 65-inch 4K TV")
            $table->text('description');  // Detailed description of the product
            $table->string('model')->nullable();  // Product model (e.g., "Q90T")
            $table->decimal('price', 10, 2);  // Price of the product
            $table->decimal('sale_price', 10, 2)->nullable();  // Sale price if any discount is applied
            $table->integer('stock')->default(0);  // Number of items in stock
            $table->boolean('is_featured')->default(false);  // Whether the product is featured
            $table->foreignIdFor(User::class, "added_by")->onDelete('cascade')->default(1); //user added - default 1
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // Category ID (TV, Audio, etc.)
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');  // Brand ID (e.g., Samsung, Sony)
            $table->string('condition')->nullable();  // Product condition (New, Refurbished, etc.)
            $table->json('specifications')->nullable();  // JSON to store technical specifications
            $table->json('features')->nullable();  // JSON to store product features (e.g., 4K, Bluetooth)
            $table->string('color')->nullable();  // Color of the product
            $table->string('image_path')->nullable();  // Path to the main product image
            $table->string('slug')->unique();  // Slug for SEO-friendly URLs
            $table->timestamps();
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
