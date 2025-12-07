<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calories' => fake()->randomFloat(2, 0, 1000),
            'total_fat' => fake()->randomFloat(2, 0, 1000),
            'satured_fat' => fake()->randomFloat(2, 0, 1000),
            'trans_fat' => fake()->randomFloat(2, 0, 1000),
            'cholesterol_fat' => fake()->randomFloat(2, 0, 1000),
            'polyunsaturated_fat' => fake()->randomFloat(2, 0, 1000),
            'monounsaturated_fat' => fake()->randomFloat(2, 0, 1000),
            'carbohydrates' => fake()->randomFloat(2, 0, 1000),
            'fiber' => fake()->randomFloat(2, 0, 1000),
            'proteins' => fake()->randomFloat(2, 0, 1000),
            'unit_measurement' => fake()->randomFloat(2, 0, 1000),
            'product_category_id' => random_int(1,11),
            'user_id' => null
        ];
    }
}
