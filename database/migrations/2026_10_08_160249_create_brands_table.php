<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{

Schema::create('brands', function (Blueprint $table) {


    $table->id();


    $table->foreignId('sub_category_id')
          ->constrained()
          ->cascadeOnDelete();


    $table->string('name');


    $table->string('slug')
          ->unique();


    $table->string('logo')
          ->nullable();


    $table->boolean('status')
          ->default(1);



    $table->timestamps();


});


}
};
