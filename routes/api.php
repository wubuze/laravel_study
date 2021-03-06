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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});





Route::post('access/reg', 'Access@reg');
Route::post('access/login', 'Access@login');
Route::get('access/getUser', 'Access@getUser');


Route::group([
    'prefix' => 'test',
],
    function(){
        Route::get('index', 'Test@index');
    }
);
