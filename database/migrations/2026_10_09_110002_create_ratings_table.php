<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('customer_id')
                ->constrained('customers')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('rating');

            $table->timestamps();

            // One customer can rate a product only once.

            $table->unique(
                ['customer_id', 'product_id'],
                'unique_customer_product_rating'
            );

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};