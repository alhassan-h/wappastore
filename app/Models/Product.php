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

    public function getDiscountPrice()
    {
        $price = $this->price * 12;
        $discount_price = ($this->price > 0)?$price - ($price * 0.125):$price;
        return $discount_price;
    }

    public function getColorsArray()
    {
        return explode(', ', strtolower($this->color));
    }
}
