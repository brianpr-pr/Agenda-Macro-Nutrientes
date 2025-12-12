<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use StaticKidz\BedcaAPI\BedcaClient;
use App\Models\ProductDefault;

class ProductDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ProductDefault::factory()->count(10)->create();

//Create object for Connection
        $client = new BedcaClient();
        //Initialize empty array to storage id of product categories
        $foodGroups = [];
        $objFoodGroups = $client->getFoodGroups();

        foreach($objFoodGroups->food as $foodGroup){
            //We add the groups id to the array foodGroups
            array_push($foodGroups, $foodGroup->fg_id);
        }

        foreach($foodGroups as $foodGroupId){
            if(isset($client->getFoodsInGroup($foodGroupId)->food)){
                $foodsInGroups = $client->getFoodsInGroup($foodGroupId);
                foreach($foodsInGroups->food as $food){
                    $productDefautl = new ProductDefault();
                    $productDefautl->id = $food->f_id;
                    $productDefautl->name = $food->f_eng_name;
                    $productDefautl->calories = 0;
                    $productDefautl->total_fat = 0;            
                    $productDefautl->saturated_fat = 0;
                    $productDefautl->cholesterol_fat = 0;
                    $productDefautl->polyunsaturated_fat = 0;
                    $productDefautl->monounsaturated_fat = 0;
                    $productDefautl->carbohydrates = 0;
                    $productDefautl->fiber = 0;
                    $productDefautl->proteins = 0;
                    $productDefautl->unit_measurement = 'grams';
                    $productDefautl->product_category_id = $foodGroupId;
                    $productDefautl->trans_fat = 0;
                    $productDefautl->save();
                }
            }
        }
    }
}