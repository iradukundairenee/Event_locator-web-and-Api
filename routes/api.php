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
Route::get('/events','ApiController@events');
Route::get('/events/{id}','ApiController@event');
Route::post('/comment/{id}', 'ApiController@comment');
Route::post('/reserve/{id}','ApiController@reserve');
