<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Dish;
use App\Models\Product;
use App\Models\Day;



class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Day::factory()
        ->count(5)
        ->hasAttached(
            Menu::factory()
            ->count(2)
            ->hasAttached(
                Dish::factory()
                ->count(2)
                ->hasAttached(
                    Product::factory()->count(3)->state([
                        'user_id' => 1
                    ]),
                    ['units' => 1]
                )
            )
        )
        ->create();
    }
}
