<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
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
        'paid_price',
    ];

    /**
     * Get the order owner.
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

    public function validate(): void
    {
        $this->status = 'delivered';
        $this->save();
    }

    public static function deliveredOrdersCount($today=false): int
    {
        if( $today )
            return Order::where('status' ,'delivered')
                ->where('updated_at', 'like', date('Y-m-d')."%")
                ->get()->count();
        return Order::where('status' ,'delivered')->get()->count();
    }

    public static function undeliveredOrdersCount(): int
    {
        return Order::where('status' ,'undelivered')->get()->count();
    }

    public static function hasNewOrders(): bool
    {
        return Order::undeliveredOrdersCount() > 0;
    }

    public static function getTotalSales(): float
    {
        return Order::get()->sum('paid_price');
    }

    public static function getMonthSales($month): float
    {
        return Order::where('created_at', 'like', date("Y-")."$month%")->sum('paid_price');
    }

    public static function getTodaySales(): float
    {
        return Order::where('created_at', 'like', date('Y-m-d')."%")->sum('paid_price');
    }
    
    public static function getLastSaleDate(): string
    {
        return Order::where('status', 'delivered')->max('updated_at');
    }

    public static function getTotalOrders(): int
    {
        return Order::get()->count();
    }

    public static function getMonthOrders($month): int
    {
        return Order::where('created_at', 'like', date("Y-")."$month%")->count();
    }

    public static function getTodayOrders(): int
    {
        return Order::where('created_at', 'like', date('Y-m-d')."%")->count();
    }

    public static function getLastOrderDate(): string
    {
        return Order::max('created_at');
    }


}
