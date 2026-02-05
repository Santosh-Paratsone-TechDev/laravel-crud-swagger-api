<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    /**
     * Get the user (vendor/admin) that owns this product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the orders that contain this product.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
