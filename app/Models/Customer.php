<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'profile',
        'address',
    ];

    /**
     * Get the customer as a user.
     *
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the customer cart.
     *
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }

    /**
     * Get the customer order.
     *
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function hasInCart( $product ): bool
    {
        return Cart::where([
            ['customer_id', $this->id],
            ['product_id', $product->id],
        ])->count() > 0;
    }

    public function getFromCart( $product ): Cart
    {
        return Cart::where([
            ['customer_id', $this->id],
            ['product_id', $product->id],
        ])->first();
    }

    public function deliveredOrders( )
    {
        return $this->order->where('status', 'delivered');
    }

    public function undeliveredOrders( )
    {
        return $this->order->where('status', 'undelivered');
    }
}
