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


Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::post('run', 'Api\v1\BoxesController@run');
    Route::get('add-day', 'Api\v1\BoxesController@incrementDay');
    Route::get('get-day', 'Api\v1\BoxesController@getDay');
    Route::get('get-all', 'Api\v1\BoxesController@getAll');
    Route::get('get-max', 'Api\v1\BoxesController@getMax');
    Route::get('get-min', 'Api\v1\BoxesController@getMin');
    Route::post('stop', 'Api\v1\BoxesController@stop');
    Route::post('reset', 'Api\v1\BoxesController@reset');
});