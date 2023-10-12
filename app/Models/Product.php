<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'gender',
        'color',
        'quantity',
        'price',
        'image',
    ];

    /**
     * Get the product in cart.
     *
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function inCart(): bool
    {
        return ($this->cart)->count() != 0;
    }
}
