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
Route::get('/city/neighorhood/{id}','CityController@allNeighorhood');
Route::get('/neighorhood/mosque/{id}','NeighborhoodController@allMosques');
Route::post('/complement/add','Complaint\ComplaintController@store');
Route::post('/suggestion/add','SuggestionController@store');
Route::post('/requestActivity/add','RequestActivite@add');

