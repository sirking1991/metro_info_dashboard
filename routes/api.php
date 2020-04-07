<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/regions', function(){
    return \App\Regions::all();
});

Route::get('/lgus/{regionShortName}', function($regionShortName){
    return \App\LGU::where('region_short_name', $regionShortName)->get();
});

Route::post('/send_message', 'MessangerController@send');

Route::post('/register_app_user', 'AppUsersController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
