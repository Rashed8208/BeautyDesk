<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Country;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ProductController extends Controller
{


public function index()
{

$products = Product::latest()->get();


return view(
'Table.products.index',
compact('products')
);

}



public function create()
{


$countries = Country::all();

$categories = Category::all();

$subCategories = SubCategory::all();

$brands = Brand::all();



return view(
'Table.products.create',
compact(
'countries',
'categories',
'subCategories',
'brands'
)
);


}




public function store(Request $request)
{


$request->validate([

'name'=>'required',

'sku'=>'required|unique:products',

'price'=>'required',

'thumbnail'=>'nullable|image'


]);



$image=null;


if($request->hasFile('thumbnail'))
{

$file=$request->file('thumbnail');

$name=time().'.'.$file->getClientOriginalExtension();

$file->move(
public_path('uploads/products'),
$name
);


$image=$name;

}




Product::create([


'country_id'=>$request->country_id,

'category_id'=>$request->category_id,

'sub_category_id'=>$request->sub_category_id,

'brand_id'=>$request->brand_id,


'name'=>$request->name,

'slug'=>Str::slug($request->name),

'sku'=>$request->sku,


'description'=>$request->description,


'price'=>$request->price,

'sale_price'=>$request->sale_price,


'stock'=>$request->stock,


'thumbnail'=>$image,


'status'=>$request->status



]);



return redirect()
->route('products.index')
->with(
'success',
'Product Added Successfully'
);


}




public function edit(Product $product)
{


return view(
'Table.products.edit',
compact('product')
);


}




public function update(Request $request, Product $product)
{


$request->validate([

'name'=>'required',

'price'=>'required'

]);



$product->update([


'name'=>$request->name,

'slug'=>Str::slug($request->name),


'price'=>$request->price,

'sale_price'=>$request->sale_price,

'stock'=>$request->stock,


'description'=>$request->description,


'status'=>$request->status


]);



return redirect()
->route('products.index')
->with(
'success',
'Product Updated'
);


}




public function destroy(Product $product)
{

if($product->thumbnail)
{

$file=
public_path(
'uploads/products/'.$product->thumbnail
);


if(file_exists($file))
unlink($file);

}


$product->delete();



return back()
->with(
'success',
'Product Deleted'
);


}



}