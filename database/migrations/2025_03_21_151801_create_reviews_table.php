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
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'added_by')->cascade('delete')->default(1);  // User ID who added the image
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Product ID the review is for
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // User ID who created the review
            $table->tinyInteger('rating')->default(0);  // Rating for the product (1-5)
            $table->text('review_text')->nullable();  // The text of the review
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
