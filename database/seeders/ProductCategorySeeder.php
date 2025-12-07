<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $categories = ['Huevos y derivados', 
            'Cárnicos y derivados', 
            'Pescados, moluscos, reptiles, crustáceos y derivados', 
            'Grasas y aceites', 
            'Cereales y derivados', 
            'Legumbres, semillas, frutos secos y derivados', 
            'Verduras, hortalizas y derivados', 
            'Azúcar, chocolate y derivados', 
            'Bebidas (no lácteas)', 
            'Miscelánea', 
            'Productos de uso nutricional específico'];

        foreach($categories as $category){
            ProductCategory::create([
                'category' => $category
            ]);    
        }
    }
}