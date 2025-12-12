<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDefault>
 */
class ProductDefaultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => random_int(1,1000),
            'name' => fake()->name(),
            'calories' => fake()->randomFloat(2, 0, 1000),
            'total_fat' => fake()->randomFloat(2, 0, 1000),
            'saturated_fat' => fake()->randomFloat(2, 0, 1000),
            'trans_fat' => fake()->randomFloat(2, 0, 1000),
            'cholesterol_fat' => fake()->randomFloat(2, 0, 1000),
            'polyunsaturated_fat' => fake()->randomFloat(2, 0, 1000),
            'monounsaturated_fat' => fake()->randomFloat(2, 0, 1000),
            'carbohydrates' => fake()->randomFloat(2, 0, 1000),
            'fiber' => fake()->randomFloat(2, 0, 1000),
            'proteins' => fake()->randomFloat(2, 0, 1000),
            'unit_measurement' => fake()->randomFloat(2, 0, 1000),
            'product_category_id' => random_int(1,11),
        ];
    }
}
