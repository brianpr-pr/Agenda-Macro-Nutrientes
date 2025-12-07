<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_macronutrients_menu',
    ];

    /**
     * Get which user this menu belongs to.
     */
    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    /**
     * The dishes that belongs to this menu.
     */
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withTimestamps();
    }

    /**
     * The days that belongs to this menu.
     */
    public function days(): BelongsToMany
    {
        return $this->belongsToMany(Day::class)->withTimestamps();
    }
}