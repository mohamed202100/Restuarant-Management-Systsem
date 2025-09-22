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
        Schema::create('food_carts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('userID');
            $table->integer('food_id');
            $table->string('food_name')->nullable();
            $table->string('food_details')->nullable();
            $table->string('food_image')->nullable();
            $table->integer('food_price')->nullable();
            $table->integer('food_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_carts');
    }
};
