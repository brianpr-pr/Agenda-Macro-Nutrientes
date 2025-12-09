<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(Request $request){
        $result = '';

        /*
        if($request->isMethod('post')){

            if( $request->input('calories') === null){
                $result .= "Amount of calories can't be empty ";
            }

            
            if( $request->input('total_fat') === null){
                $result .= "Amount of total fat can't be empty";
            }

            if( $request->input('satured_fat') === null){
                $result .= "Amount of satured fat can't be empty";
            }

            if( $request->input('trans_fat') === null){
                $result .= "Amount of trans fat can't be empty";
            }

            if( $request->input('cholesterol_fat') === null){
                $result .= "Amount of cholesterol fat can't be empty";
            }

            if( $request->input('polyunsaturated_fat') === null){
                $result .= "Amount of polyunsaturated fat can't be empty";
            }

            if( $request->input('monounsaturated_fat') === null){
                $result .= "Amount of monounsaturated fat can't be empty";
            }

            if( $request->input('carbohydrates') === null){
                $result .= "Amount of carbohydrates can't be empty";
            }

           if( $request->input('fiber') === null){
                $result .= "Amount of fiber can't be empty";
            }

            if( $request->input('carbohydrates') === null){
                $result .= "Amount of carbohydrates can't be empty";
            }

            if( $request->input('proteins') === null){
                $result .= "Amount of proteins can't be empty";
            }

            if( $request->input('unit_measurement') === null){
                $result .= "Unit of measurement can't be empty";
            }

            if( $request->input('product_category_id') === null){
                $result .= "Product category can't be empty";
            }
            
            if($result === ''){
                Product::create([
                    'calories' => $request->input('calories'),
                    'total_fat' => $request->input('total_fat'),
                    'satured_fat' =>  $request->input('satured_fat'),
                    'trans_fat' =>  $request->input('trans_fat'),
                    'cholesterol_fat' =>  $request->input('cholesterol_fat'),
                    'polyunsaturated_fat' =>  $request->input('polyunsaturated_fat'),
                    'monounsaturated_fat' =>  $request->input('monounsaturated_fat'),
                    'carbohydrates' =>  $request->input('carbohydrates'),
                    'fiber' =>  $request->input('fiber'),
                    'unit_measurement' => $request->input('unit_measurement'),
                    'product_category_id' => $request->input('product_category_id'),
                    'user_id' => 1
                ]);
                $result = 'Product has been created succesfully';
            }   
        }
*/


//Test built-in laravel validation 
//Rows are not getting inserted
$validatedData = '';
        if($request->isMethod('post')){
            $validatedData = $request->validate([
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
                'product_category_id' => 'required',
            ]);

            Product::create([
                'calories' => $request->input('calories'),
                'total_fat' => $request->input('total_fat'),
                'saturated_fat' => $request->input('saturated_fat'),
                'trans_fat' => $request->input('trans_fat'),
                'cholesterol_fat' => $request->input('cholesterol_fat'),
                'polyunsaturated_fat' => $request->input('polyunsaturated_fat'),
                'monounsaturated_fat' => $request->input('monounsaturated_fat'),
                'carbohydrates' => $request->input('carbohydrates'),
                'fiber' => $request->input('fiber'),
                'proteins' => $request->input('proteins'),
                'unit_measurement' => $request->input('unit_measurement'),
                'product_category_id' => $request->input('product_category_id'),
                'user_id' => 1,
            ]);
        }
        return view('products', [
            'products' => Product::where('user_id',  User::first()->id)
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => $validatedData
        ]);
    }
}