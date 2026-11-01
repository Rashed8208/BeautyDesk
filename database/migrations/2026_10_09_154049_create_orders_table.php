<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('customer_id')
                ->constrained('customers')
                ->restrictOnDelete();

            $table->string('order_number')->unique();

            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');

            $table->text('shipping_address');
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();

            $table->decimal('subtotal', 12, 2);
            $table->decimal('shipping_charge', 12, 2)
                ->default(0);

            $table->decimal('discount', 12, 2)
                ->default(0);

            $table->decimal('total_amount', 12, 2);

            $table->string('payment_method')
                ->default('cod');

            $table->string('payment_status')
                ->default('unpaid');

            $table->string('order_status')
                ->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};