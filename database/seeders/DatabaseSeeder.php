<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductCategorySeeder::class,
            UserSeeder::class,
            //DishSeeder::class,
            //MenuSeeder::class,
            //DaySeeder::class,
            //ProductSeeder::class,
            ProductDefaultSeeder::class,
        ]);
    }
}
/**
 * Im not able to use the seeder from DishSeeder it cant add or update a child row
 * i will go to eat, once im back watch video, read docs to try to understand what the hell am actually doing.
 */