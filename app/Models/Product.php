<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * Get which user this product belongs to.
     */
    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

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
        'user_id'
    ];
}
