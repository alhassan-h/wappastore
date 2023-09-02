<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
