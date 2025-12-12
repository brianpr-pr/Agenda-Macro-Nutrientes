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
        foreach($client->getFoodGroups()->food as $food ){
            //We add the groups id to the array foodGroups
            array_push($foodGroups,$food->fg_id);
        }

        foreach($foodGroups as $foodGroup){
            //Retrive food id
            //var_dump($foodGroup->food);
            if( isset( $client->getFoodsInGroup($foodGroup)->food ) ){
                foreach($client->getFoodsInGroup($foodGroup)->food as $food){
                    $foodId = $food->f_id; 
                    if(isset($client->getFood( $foodId )->food)){
                        $foodData = $client->getFood( $foodId )->food;
                        $productDefautl = new ProductDefault();
                        $productDefautl->id = intval($foodId);
                        
                        if(isset($foodData->f_eng_name)){        
                            $productDefautl->name = (gettype( $foodData->f_eng_name ) !== "string" ? "Unknown" : $foodData->f_eng_name);
                        }else{
                            $productDefautl->name = 'Unknown';
                        }

                        if(isset($foodData->foodvalue)){
                            if(gettype($foodData->foodvalue) === "array"){
                                if(isset($foodData->foodvalue[1])){
                                    $productDefautl->calories = (gettype($foodData->foodvalue[1]->best_location) !== "string" ? '0' : round(floatval( $foodData->foodvalue[1]->best_location) / 4.184,2));
                                }else{
                                    $productDefautl->calories = 0;
                                }
                                
                                if(isset($foodData->foodvalue[2])){
                                    $productDefautl->total_fat = (gettype($foodData->foodvalue[2]->best_location) !== "string" ? '0' : round($foodData->foodvalue[2]->best_location, 2) );       
                                }else{
                                    $productDefautl->total_fat = 0;
                                }
                                
                                if(isset($foodData->foodvalue[9])){
                                    $productDefautl->saturated_fat = (gettype($foodData->foodvalue[9]->best_location) !== "string" ? '0' : round($foodData->foodvalue[9]->best_location, 2) );
                                }else{
                                    $productDefautl->saturated_fat = 0;
                                }
                                
                                if(isset($foodData->foodvalue[10])){
                                    $productDefautl->cholesterol_fat = (gettype($foodData->foodvalue[10]->best_location) !== "string" ? '0' : round($foodData->foodvalue[10]->best_location,2) );
                                }else{
                                    $productDefautl->cholesterol_fat = 0;
                                }
                                
                                if(isset($foodData->foodvalue[8])){
                                    $productDefautl->polyunsaturated_fat = (gettype($foodData->foodvalue[8]->best_location) !== "string" ? '0' : round($foodData->foodvalue[8]->best_location, 2) );
                                }else{
                                    $productDefautl->polyunsaturated_fat = 0;
                                }
                                
                                if(isset($foodData->foodvalue[7])){
                                    $productDefautl->monounsaturated_fat =  (gettype($foodData->foodvalue[7]->best_location) !== "string" ? '0' : round($foodData->foodvalue[7]->best_location, 2) );
                                }else{
                                    $productDefautl->monounsaturated_fat = 0;
                                }
                                
                                if(isset($foodData->foodvalue[5])){
                                    $productDefautl->carbohydrates = (gettype($foodData->foodvalue[5]->best_location) !== "string" ? '0' : round($foodData->foodvalue[5]->best_location, 2) );
                                }else{
                                    $productDefautl->carbohydrates = 0;
                                }
                                
                                if(isset($foodData->foodvalue[6])){
                                    $productDefautl->fiber =  (gettype($foodData->foodvalue[6]->best_location) !== "string" ? '0' : round($foodData->foodvalue[6]->best_location, 2) );
                                }else{
                                    $productDefautl->fiber = 0;
                                }

                                if(isset($foodData->foodvalue[3])){
                                    $productDefautl->proteins = (gettype($foodData->foodvalue[3]->best_location) !== "string" ? '0' : round($foodData->foodvalue[3]->best_location, 2) );
                                }else{
                                    $productDefautl->proteins = 0;
                                }
                                
                            }else{
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
                                $productDefautl->product_category_id = intval($foodGroup);
                            }
                        }else{
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
                            $productDefautl->product_category_id = intval($foodGroup);
                        }
                        $productDefautl->unit_measurement = 'grams';                            
                        $productDefautl->product_category_id = intval($foodGroup);
                        $productDefautl->trans_fat = 0;
                        $productDefautl->save();
                    }
                }
            }
        }
    }
}