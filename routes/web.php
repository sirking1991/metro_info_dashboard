<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-lgu/{lguSlug}', function($lguSlug){
    $lgu = \App\LGU::where('slug', $lguSlug)->limit(1)->get();
    return view('about-lgu', ['lgu' => $lgu[0]]);    
});

Route::get('/download-app', function () {
    return view('download-app');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/news-list', 'NewsController@index')->name('news');
Route::get('/news/{id?}', 'NewsController@show');
Route::match(['post', 'put'], '/news/{id?}', 'NewsController@save');
Route::get('/news/{id}/publish', 'NewsController@publish');
Route::get('/news/{id}/unpublish', 'NewsController@unpublish');
Route::get('/news/{id}/delete', 'NewsController@delete');

Route::get('/events-list', 'EventsController@index')->name('events');
Route::get('/events/{id?}', 'EventsController@show');
Route::match(['post', 'put'], '/events/{id?}', 'EventsController@save');
Route::get('/events/{id}/delete', 'EventsController@delete');

Route::get('/broadcasts-list', 'BroadcastController@index')->name('broadcast');
Route::get('/broadcasts/{id?}', 'BroadcastController@show');
Route::match(['post', 'put'], '/broadcasts/{id?}', 'BroadcastController@save');
Route::get('/broadcasts/{id}/delete', 'BroadcastController@delete');

Route::post('/applyadmin', 'HomeController@applyAdmin');
