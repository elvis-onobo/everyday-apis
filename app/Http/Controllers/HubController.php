<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Hub;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //get all the hubs in a country
        $hubs = Hub::where('country_id', $id)->get();

        return response()->json($hubs);
    }

    /*
    * returns all the hubs associated with a state
    */
    public function stateHubs($id)
    {
        //get all the hubs in a country
        $hubs = Hub::where('state_id', $id)->get();

        return response()->json($hubs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a hub related to a state
        $hub = new Hub;
        $hub->country_id = $request->input('country_id');
        $hub->state_id = $request->input('state_id');
        $hub->hub_name = $request->input('hub_name');
        $hub->hub_address = $request->input('hub_address');
        $hub->phone = $request->input('phone');
        $hub->website = $request->input('website');

        if($hub->save()){
            return response()->json($hub);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $hub_id)
    {
        // get single hub associated with a state
        $hub = Hub::where(['state_id'=>$id, 'id'=>$hub_id])->first();

        return response()->json($hub);
    }

    /*
    * Gets all hubs regardless of country or state
    */
    public function all(){
        // get all the hubs
        $hubs = Hub::paginate(20);

        return response()->json($hubs);
    }

    /*
    *   returns the data for one hub based on the ID passed
    */
    public function one($id){
        // returns the data for only one hub
        $hub = Hub::where('id', $id)->first();

        return response()->json($hub);
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
        if(Hub::where('id', $id)->update(
            [
                'country_id'=>$request->input('country_id'),
                'state_id'=>$request->input('state_id'),
                'hub_name'=>$request->input('hub_name'),
                'hub_address'=>$request->input('hub_address'),
                'phone'=>$request->input('phone'),
                'website'=>$request->input('website')
            ]
        )){
            return response()->json(['status'=>'successfully updated']);
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
        $hub = Hub::findOrFail($id);

        // return country as a resource
        if($hub->delete()){
            return response()->json(['status'=>'successful']);
        }
    }
}
