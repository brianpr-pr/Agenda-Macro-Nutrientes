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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //Should this be unique?
            $table->string('name')->default('');
            $table->double('calories')->unsigned()->default(0.0);
            $table->unsignedBigInteger('product_creation_id')->references('id')->on('product_creations');
            $table->unsignedBigInteger('product_default_id')->references('id')->on('product_defaults');
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