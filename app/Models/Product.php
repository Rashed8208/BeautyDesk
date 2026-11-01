<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{


protected $fillable=[

    'country_id',
    'category_id',
    'sub_category_id',
    'brand_id',
    'name',
    'slug',
    'sku',
    'description',
    'price',
    'sale_price',
    'stock',
    'thumbnail',
    'status'

];



public function country()
{
    return $this->belongsTo(Country::class);
}



public function category()
{
    return $this->belongsTo(Category::class);
}



public function subCategory()
{
    return $this->belongsTo(SubCategory::class);
}



public function brand()
{
    return $this->belongsTo(Brand::class);
}



public function images()
{
    return $this->hasMany(ProductImage::class);
}



public function variations()
{
    return $this->hasMany(ProductVariation::class);
}

public function wishlists()
{

    return $this->hasMany(Wishlist::class);

}

public function ratings()
{
    return $this->hasMany(Rating::class);
}


public function getAverageRatingAttribute()
{
    return round(
        (float) $this->ratings()->avg('rating'),
        1
    );
}

public function reviews()
{
    return $this->hasMany(Review::class);
}


public function purchaseItems()
{
    return $this->hasMany(PurchaseItem::class);
}

public function stockMovements()
{
    return $this->hasMany(StockMovement::class);
}
}