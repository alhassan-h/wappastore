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
        'type',
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
        return $this->type == 'bulk';
    }

    public function getDiscountPercent()
    {
        return $this->hasDiscount()?'12.5':'0';
    }

    public function getActualPrice()
    {
                
        $price = $this->getTotalPrice();

        if($this->hasDiscount())
            $price *= 12;

        return $price;
    }

    public function getDiscountPrice()
    {
        
        if($this->hasDiscount())
            $discount_price = $this->product->getDiscountPrice() * $this->getQuantity();
        else
            $discount_price = $this->getTotalPrice();

        return $discount_price;
    }


}
