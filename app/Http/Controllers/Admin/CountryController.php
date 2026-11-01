<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::latest()->get();

        return view('Table.countries.index', compact('countries'));
    }


    public function create()
    {
        return view('Table.countries.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:countries,name',
            'flag'=>'nullable'
        ]);


        Country::create([

            'name'=>$request->name,

            'slug'=>Str::slug($request->name),

            'flag'=>$request->flag,

            'status'=>$request->status ?? 1

        ]);


        return redirect()
        ->route('countries.index')
        ->with('success','Country Added Successfully');

    }



    public function edit(Country $country)
    {
        return view('Table.countries.edit',
        compact('country'));
    }



    public function update(Request $request, Country $country)
    {

        $request->validate([

            'name'=>'required'

        ]);


        $country->update([

            'name'=>$request->name,

            'slug'=>Str::slug($request->name),

            'flag'=>$request->flag,

            'status'=>$request->status ?? 1

        ]);


        return redirect()
        ->route('countries.index')
        ->with('success','Country Updated');

    }




    public function destroy(Country $country)
    {

        $country->delete();


        return redirect()
        ->route('countries.index')
        ->with('success','Country Deleted');

    }

}