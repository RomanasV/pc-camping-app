<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return '<h1>Hello :)</h1><p>Go to <a href="/campings">Campings</a></p>';
});

Route::resource('campings', 'CampingsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
