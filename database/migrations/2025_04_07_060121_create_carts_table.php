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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to user
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Link to product
            $table->integer('quantity')->default(1); // Quantity of the product
            $table->decimal('price', 10, 2); // Total price for the quantity
            $table->timestamps();
            $table->index(['user_id', 'product_id']);
        }); 
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
