<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use App\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //return all states belonging to a country
        $states = State::where('country_id',$id)->get();

        if(empty($states)){
            return null;
        }
        return response()->json($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a state related to a country by ID
        $state = new State;
        $state->country_id = $request->input('country_id');
        $state->state = $request->input('state');

        if($state->save()){
            return response()->json($state);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $state_id)
    {
        //display a single state in a country
        $state = State::where(['country_id'=>$id, 'id'=>$state_id])->first();

        return response()->json($state);
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
            'state' => 'required'
        ]);
        //update a country
        if(State::where('id', $id)->update(['state'=>$request->input('state')])){
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
        $state = State::findOrFail($id);

        // return country as a resource
        if($state->delete()){
            return response()->json(['status'=>'successful']);
        }
    }
}
