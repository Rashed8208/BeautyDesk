<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('reviews', function (Blueprint $table) {


            $table->id();


            $table->foreignId('customer_id')
                ->constrained('customers')
                ->cascadeOnDelete();


            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();


            $table->text('review');


            $table->enum('status',[
                'pending',
                'approved',
                'rejected'
            ])
            ->default('pending');


            $table->timestamps();



            // One customer one product one review

            $table->unique([
                'customer_id',
                'product_id'
            ]);

        });

    }


    public function down(): void
    {

        Schema::dropIfExists('reviews');

    }

};