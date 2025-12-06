<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'calories',
        'total_fat',
        'satured_fat',
        'trans_fat',
        'cholesterol_fat',
        'polyunsaturated_fat',
        'monounsaturated_fat',
        'carbohydrates',
        'fiber',
        'proteins',
        'unit_measurement',
        'product_category_id',
    ];
}
