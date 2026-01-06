<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'payment_method',
    ];

    // 一筆訂單 屬於 一個使用者
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 一筆訂單 有 多筆訂單商品
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
