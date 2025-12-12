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
        
        return view('products', [
            'products' => Product::where('user_id',  Auth::id() )
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => '$client'
        ]);
    }
}