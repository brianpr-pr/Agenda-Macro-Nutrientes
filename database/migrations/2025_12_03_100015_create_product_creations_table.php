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
        Schema::create('product_creations', function (Blueprint $table) {
            $table->id();
            //Should this be unique?
            $table->string('name')->default('');
            $table->double('calories')->unsigned()->default(0.0);
            $table->double('total_fat')->unsigned()->default(0.0);
            $table->double('saturated_fat')->unsigned()->default(0.0);
            $table->double('trans_fat')->unsigned()->default(0.0);
            $table->double('cholesterol_fat')->unsigned()->default(0.0);
            $table->double('polyunsaturated_fat')->unsigned()->default(0.0);
            $table->double('monounsaturated_fat')->unsigned()->default(0.0);
            $table->double('carbohydrates')->unsigned()->default(0.0);
            $table->double('fiber')->unsigned()->default(0.0);
            $table->double('proteins')->unsigned()->default(0.0);
            $table->string('unit_measurement')->default('grams');
            $table->foreignId('product_category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_creations');
    }
};
