<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use StaticKidz\BedcaAPI\BedcaClient;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Product::factory()->count(10)->create();
        // $client = new BedcaClient();
        // //[]
        // foreach($client->getFoodGroups()->food as $foodGroup){
        //     array_push($categories, $foodGroup->fg_eng_name );
        // }
    }
}