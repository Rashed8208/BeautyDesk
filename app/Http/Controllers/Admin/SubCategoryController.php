<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class SubCategoryController extends Controller
{


public function index()
{

$subCategories = SubCategory::with('category')
->latest()
->get();


return view('Table.sub_categories.index',
compact('subCategories'));

}




public function create()
{

$categories = Category::where('status',1)->get();


return view('Table.sub_categories.create',
compact('categories'));

}





public function store(Request $request)
{


$request->validate([

'category_id'=>'required',

'name'=>'required'

]);



SubCategory::create([


'category_id'=>$request->category_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'status'=>$request->status ?? 1


]);



return redirect()
->route('sub-categories.index')
->with('success','Sub Category Added');


}




public function edit(SubCategory $subCategory)
{

$categories = Category::all();


return view('Table.sub_categories.edit',
compact('subCategory','categories'));

}




public function update(Request $request, SubCategory $subCategory)
{


$subCategory->update([


'category_id'=>$request->category_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'status'=>$request->status ?? 1


]);



return redirect()
->route('sub-categories.index')
->with('success','Updated Successfully');


}




public function destroy(SubCategory $subCategory)
{


$subCategory->delete();


return back()
->with('success','Deleted Successfully');


}


}