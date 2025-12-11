<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use StaticKidz\BedcaAPI\BedcaClient;

class ProductController extends Controller
{
    public function products(Request $request): View
    {
    $result = '';
    
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'calories' => 'required|numeric|min:1',
                'total_fat' => 'required|numeric|min:0',
                'saturated_fat' => 'required|numeric|min:0',
                'trans_fat' => 'required|numeric|min:0',
                'cholesterol_fat' => 'required|numeric|min:0',
                'polyunsaturated_fat' => 'required|numeric|min:0',
                'monounsaturated_fat' => 'required|numeric|min:0',
                'carbohydrates' => 'required|numeric|min:0',
                'fiber' => 'required|numeric|min:0',
                'proteins' => 'required|numeric|min:0',
                'unit_measurement' => 'required|string|max:255',
                'product_category_id' => 'required|numeric|min:1',
            ]);
            $validatedData['user_id'] = Auth::id();

            $result = 'Product created succesfully';
            Product::create($validatedData);
        }


        //Create object for Connection
        $client = new BedcaClient();

        //Initialize empty array to storage id of product categories
        $foodGroups = [];
        foreach($client->getFoodGroups()->food as $food ){
            //We add the groups id to the array foodGroups
            array_push($foodGroups,$food->fg_id);
        }

        //To show id of groups
        //echo var_dump($foodGroups);

        //To retrive a instance of a product
        //echo var_dump($client->getFoodsInGroup($foodGroups[0])->food[0] );
        
        //Storage of id from a product
        //$idRandomProduct = $client->getFoodsInGroup($foodGroups[0])->food[0]->f_id;
        //echo $idRandomProduct;

        //Get english name from a product
        //echo var_dump($client->getFood($idRandomProduct)->food->f_eng_name );
        

        //Untested
        
        //dump( isset($client->getFoodsInGroup(1 )->food ) );

        /*
        foreach($foodGroups as $foodGroup){
            //Retrive food id
            //var_dump($foodGroup->food);
            if( isset( $client->getFoodsInGroup($foodGroup)->food ) ){
                dump( $client->getFood( $client->getFoodsInGroup( $foodGroup)->food[0]->f_id )->food);
            }
        }*/
        
        //var_dump(  $client->getFood($client->getFoodsInGroup(1)->food[10]->f_id)->food->f_eng_name );
        //dump( $client->getFoodsInGroup(13) );
        

        $valor = [
            'id' => $client->getFoodsInGroup(1)->food[0]->f_id,
            'name' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->f_eng_name,
            'calories' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[1]->best_location,
            'total_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[2]->best_location,
            'saturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[9]->best_location,
            'trans_fat' => 0,
            'cholesterol_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[10]->best_location,
            'polyunsaturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[8]->best_location,
            'monounsaturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[7]->best_location,
            'carbohydrates' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[5]->best_location,
            'fiber' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[6]->best_location,
            'proteins' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food->foodvalue[3]->best_location,
            'unit_measurement' => 'grams',
            'product_category_id' => 1,//$foodGroup,
            'user_id' => 1
        ];
        /*
        $valor = [
            'id' => $client->getFoodsInGroup(1)->food[0]->f_id,
            'name' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->f_eng_name,
            'calories' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[1]->best_location,
            'total_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[2]->best_location,
            'saturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[9]->best_location,
            'trans_fat' => 0,
            'cholesterol_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[10]->best_location,
            'polyunsaturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[8]->best_location,
            'monounsaturated_fat' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[7]->best_location,
            'carbohydrates' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[5]->best_location,
            'fiber' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[6]->best_location,
            'proteins' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[3]->best_location,
            'unit_measurement' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[]->best_location,
            'product_category_id' => $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->foodvalue[]->best_location,
            'user_id' => 1
        ];*/
        

        
        foreach($foodGroups as $foodGroup){
            //Retrive food id
            //var_dump($foodGroup->food);
            if( isset( $client->getFoodsInGroup($foodGroup)->food ) ){
                $foodId = $client->getFoodsInGroup($foodGroup)->food[0]->f_id;
                $foodData = $client->getFood( $foodId )->food;
                $valor = [
                    'id' => intval($foodId),
                    'name' => (gettype( $foodData->f_eng_name ) !== "string" ? "Unknown" : $foodData->f_eng_name),

                    'calories' => (gettype($foodData->foodvalue[1]->best_location) !== "string" ? '0' : round(floatval( $foodData->foodvalue[1]->best_location) / 4.184,2)),

                    'total_fat' => (gettype($foodData->foodvalue[2]->best_location) !== "string" ? '0' : round($foodData->foodvalue[2]->best_location, 2) ),
                    'saturated_fat' => (gettype($foodData->foodvalue[9]->best_location) !== "string" ? '0' : round($foodData->foodvalue[9]->best_location, 2) ),
                    'trans_fat' => 0,
                    'cholesterol_fat' => (gettype($foodData->foodvalue[10]->best_location) !== "string" ? '0' : round($foodData->foodvalue[10]->best_location,2) ),
                    'polyunsaturated_fat' => (gettype($foodData->foodvalue[8]->best_location) !== "string" ? '0' : round($foodData->foodvalue[8]->best_location, 2) ),
                    'monounsaturated_fat' =>  (gettype($foodData->foodvalue[7]->best_location) !== "string" ? '0' : round($foodData->foodvalue[7]->best_location, 2) ),
                    'carbohydrates' => (gettype($foodData->foodvalue[5]->best_location) !== "string" ? '0' : round($foodData->foodvalue[5]->best_location, 2) ),
                    'fiber' =>  (gettype($foodData->foodvalue[6]->best_location) !== "string" ? '0' : round($foodData->foodvalue[6]->best_location, 2) ),
                    'proteins' => (gettype($foodData->foodvalue[3]->best_location) !== "string" ? '0' : round($foodData->foodvalue[3]->best_location, 2) ),
                    'unit_measurement' => 'grams',
                    'product_category_id' => intval($foodGroup),
                    'user_id' => 1
                ];
                dump($valor);
            }
        }

        //dump($valor);

            //dump($client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id ) );

        //var_dump($client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id ));

        //dump( $client->getFood( $client->getFoodsInGroup(1)->food[0]->f_id )->food);

        return view('products', [
            'products' => Product::where('user_id',  Auth::id() )
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => '$client'
        ]);
    }
}