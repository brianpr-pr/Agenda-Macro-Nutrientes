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
            ProductDefaultSeeder::class,
            ProductCreationSeeder::class,
            ProductSeeder::class,
            DishSeeder::class,
            MenuSeeder::class,
            DaySeeder::class,
        ]);
    }
}