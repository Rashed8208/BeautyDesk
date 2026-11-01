<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{


public function index()
{

$categories = Category::with('country')
->latest()
->get();


return view('Table.categories.index',
compact('categories'));

}



public function create()
{

$countries = Country::where('status',1)->get();


return view('Table.categories.create',
compact('countries'));

}



public function store(Request $request)
{


$request->validate([

'country_id'=>'required',

'name'=>'required'

]);



Category::create([


'country_id'=>$request->country_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'status'=>$request->status ?? 1


]);



return redirect()
->route('categories.index')
->with('success','Category Added');


}



public function edit(Category $category)
{


$countries = Country::all();


return view('Table.categories.edit',
compact('category','countries'));

}




public function update(Request $request, Category $category)
{


$category->update([


'country_id'=>$request->country_id,

'name'=>$request->name,

'slug'=>Str::slug($request->name),

'status'=>$request->status ?? 1


]);



return redirect()
->route('categories.index')
->with('success','Category Updated');


}




public function destroy(Category $category)
{


$category->delete();



return back()
->with('success','Category Deleted');


}


}