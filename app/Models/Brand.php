<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{


protected $fillable=[

'sub_category_id',
'name',
'slug',
'logo',
'status'

];



public function subCategory()
{
return $this->belongsTo(SubCategory::class);
}


}