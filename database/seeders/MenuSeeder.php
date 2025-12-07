<?php

namespace Database\Seeders;

use Database\Factories\MenuFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Dish;
use App\Models\Product;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::factory()
        ->hasAttached(
            Dish::factory()
            ->count(5)
            ->hasAttached(
                Product::factory()->count(3),
                ['units' => 1]
            )
        )
        ->count(10)
        ->create();
    }
}