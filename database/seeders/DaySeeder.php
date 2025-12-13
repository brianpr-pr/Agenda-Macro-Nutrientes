<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Dish;
use App\Models\Product;
use App\Models\Day;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $numberOfRows = DB::table('menus')->count();
        for($numberDays = 0; $numberDays < 10; $numberDays++){
            $i = 0;
            $menusForDay = [];

            while($i < 3){
                $menu = Menu::find(random_int(1,$numberOfRows));
                
                if($menu){
                    array_push($menusForDay, $menu);        
                    $i++;
                }
            }
            
            $day = Day::create([
                'user_id' => random_Int(1,1),
                'total_macronutrients_day' => 12000,
                'timestamp' => now(),
            ]);

            foreach($menusForDay as $menuOfDay){
                $day->menus()->attach($menuOfDay->id);
            }
        }
    }
}