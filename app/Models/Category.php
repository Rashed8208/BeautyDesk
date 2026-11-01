<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{


protected $fillable=[
'country_id',
'name',
'slug',
'status'
];



public function country()
{
return $this->belongsTo(Country::class);
}



public function subCategories()
{
return $this->hasMany(SubCategory::class);
}



}
