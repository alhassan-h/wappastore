<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get the cart owner.
     *
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Get the product.
     *
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getQuantity()
    {
        return ($this->quantity)?$this->quantity:0;
    }
    
    public function getPrice()
    {
        return $this->product->price;
    }

    public function getTotalPrice()
    {
        return $this->getPrice() * $this->getQuantity();
    }

    public function hasDiscount()
    {
        return $this->getQuantity() >= 12;
    }

    public function getDiscountPercent()
    {
        return $this->hasDiscount()?'12.5':'0';
    }

    public function getDiscountPrice()
    {
        $total_price = $this->getTotalPrice();
        $discount_price = ($this->hasDiscount())?$total_price - ($total_price * 0.125):$total_price;
        return $discount_price;
    }


}
