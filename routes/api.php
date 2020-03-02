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

Route::get('campings/popular', 'CampingsApiController@popular');
Route::get('campings/city/{name}', 'CampingsApiController@byCity');
Route::get('campings/country/{name}', 'CampingsApiController@byCountry');
Route::get('campings', 'CampingsApiController@index');