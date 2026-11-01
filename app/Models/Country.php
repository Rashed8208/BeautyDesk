<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'flag',
        'status'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}