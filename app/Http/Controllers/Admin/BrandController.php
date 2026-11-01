<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class BrandController extends Controller
{


public function index()
{

$brands = Brand::with('subCategory')
->latest()
->get();


return view('Table.brands.index',
compact('brands'));

}




public function create()
{

$subCategories = SubCategory::all();


return view('Table.brands.create',
compact('subCategories'));

}




public function store(Request $request)
{


$request->validate([

'sub_category_id'=>'required',

'name'=>'required'

]);



Brand::create([


'sub_category_id'=>$request->sub_category_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'logo'=>$request->logo,

'status'=>$request->status ?? 1


]);



return redirect()
->route('brands.index')
->with('success','Brand Added');


}




public function edit(Brand $brand)
{


$subCategories = SubCategory::all();


return view('Table.brands.edit',
compact('brand','subCategories'));

}





public function update(Request $request, Brand $brand)
{


$brand->update([


'sub_category_id'=>$request->sub_category_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'logo'=>$request->logo,

'status'=>$request->status ?? 1


]);



return redirect()
->route('brands.index')
->with('success','Brand Updated');


}





public function destroy(Brand $brand)
{


$brand->delete();


return back()
->with('success','Brand Deleted');


}



}