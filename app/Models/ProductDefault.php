<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductDefault extends Model
{

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The dishes that belongs to the product.
     */
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot('units')->withTimestamps();
    }

    /**
     * Get wich category this product belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }


     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'calories',
        'total_fat',
        'saturated_fat',
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

    /**
     * Show all products.
     */
    function getProducts()
    {
        return Product::all();
    }

}