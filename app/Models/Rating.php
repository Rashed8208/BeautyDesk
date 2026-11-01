<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'rating',
    ];


    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }


    // Rating belongs to a customer.

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }


    // Rating belongs to a product.

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}