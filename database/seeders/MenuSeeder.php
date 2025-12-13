<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $numberOfRows = DB::table('dishes')->count();
        for($numberMenus = 0; $numberMenus < 4; $numberMenus++){
            
            $i = 0 ;
            $dishesForMenu = [];

            while( $i < 3){
                $dish = Dish::find(random_int(1,$numberOfRows));
                
                if($dish){
                    array_push($dishesForMenu, $dish);        
                    $i++;
                }
            }
            
            $menu = Menu::create([
                'user_id' => random_Int(1,1),
                'total_macronutrients_menu' => 3000,
            ]);

            foreach($dishesForMenu as $dishOfMenu){
                $menu->dishes()->attach($dishOfMenu->id);
            }
        }
    }
}