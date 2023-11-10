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
        // 'profile',
        'address',
        'state',
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

    public function hasInCart( $product, $type='pieces' ): bool
    {
        return Cart::where([
            ['customer_id', $this->id],
            ['product_id', $product->id],
            ['type', $type],
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

    public function getName()
    {
        return $this->user->name;
    }

    public function getEmail()
    {
        return $this->user->email;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public static function getTotalCustomers(): int
    {
        return Customer::get()->count();
    }

    public static function getTodayCustomers(): int
    {
        return Customer::where('created_at', 'like', date('Y-m-d')."%")
            ->get()->count();
    }
}
