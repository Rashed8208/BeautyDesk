<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'name',
        'code',
        'symbol',
        'exchange_rate',
        'is_default',
        'status',
    ];

    protected $casts = [
        'exchange_rate' => 'decimal:8',
        'is_default' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }
}