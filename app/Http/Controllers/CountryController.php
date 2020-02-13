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
        return CountryResource::collection($countries);
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
            return new CountryResource($country);
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
        return new CountryResource::collection($country);
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
        //update a country
        $country = findOrFail($id);

        if($country->update())
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
            return new CountryResource::collection($country);
        }
    }
}
