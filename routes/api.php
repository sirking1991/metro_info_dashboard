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

Route::get('/news/{lgu_id}', function($lgu_id){
    return \App\News::where('lgu_id', $lgu_id)
                    ->where('status', 'published')
                    ->where('posting_date', '<=', now())
                    ->latest('posting_date')
                    ->limit(10)
                    ->get();
});

Route::get('/events/{lgu_id}', function($lgu_id){
    return \App\Events::where('lgu_id', $lgu_id)
                    ->where('event_from', '>=', date('Y-m-d H:i:s'))
                    ->oldest('event_from')
                    ->limit(20)
                    ->get();
});

Route::get('/bcastmsg/{lgu_id}', function($lgu_id){
    return \App\Broadcast::where('lgu_id', $lgu_id)
                    ->oldest('broadcast_on')
                    ->limit(3)
                    ->get();
});

Route::post('/send_message', 'MessengerController@send');

Route::post('/register_app_user', 'AppUsersController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
