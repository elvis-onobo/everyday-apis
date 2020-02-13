<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// COUNTRIES
// fetch all countries
Route::get('countries', 'CountryController@index');

// fetch single country
Route::get('country/{id}', 'CountryController@show');

// Create new country
Route::post('country', 'CountryController@store');

// update country
Route::put('country/{id}', 'CountryController@update');

// delete country
Route::delete('country/{id}', 'CountryController@destroy');

// STATES
// Get all the states associated with a country
Route::get('/country/{id}/states/', 'StateController@index');

// Get a single state associated with a country
Route::get('country/{id}/state/{state_id}', 'StateController@show');

// Add a state to a country
Route::post('state', 'StateController@store');

// update a state
Route::put('state/{id}', 'StateController@update');

// delete country
Route::delete('state/{id}', 'StateController@destroy');

// HUBS
// Get all the hubs in a country
Route::get('/country/{id}/hubs/', 'HubController@index');

// Get all the hubs associated with a state
Route::get('state/{id}/hubs/', 'HubController@stateHubs');

// Get a single hub associated with a state
Route::get('state/{id}/hub/{hub_id}', 'HubController@show');

// get list of all hubs regardless of country or state
Route::get('/hubs/all', 'HubController@all');

// get a single hub without country or state
Route::get('/hub/one/{id}', 'HubController@one');

// create a hub
Route::post('/hub', 'HubController@store');

// update a hub
Route::put('/hub/{id}', 'HubController@update');

// delete a hub
Route::delete('hub/{id}', 'HubController@destroy');
