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
