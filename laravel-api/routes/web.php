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

//API Routes
Route::post('/api/create', 'DogsController@create');
Route::post('/api/search', 'DogsController@search');


//SPA Route
Route::get('/{any}', 'SpaController@index')->where('any', '.*');