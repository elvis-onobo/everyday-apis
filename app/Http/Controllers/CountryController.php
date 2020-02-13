<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\Country as CountryResource;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get countries
        $countries = Country::paginate(12);

        // return collection of countries
        return response()->json($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store country
        $country = new Country;

        $country->country = $request->input('country');

        if($country->save()){
            return response()->json($country);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get particular country
        $country = Country::findOrFail($id);

        // return country as a resource
        return response()->json($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'country' => 'required'
        ]);
        //update a country
        if(Country::where('id', $id)->update(['country'=>$request->input('country')])){
            return response()->json(['status'=>'country updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get particular country
        $country = Country::findOrFail($id);

        // return country as a resource
        if($country->delete()){
            return response()->json(['status'=>'successful']);
        }
    }


}
