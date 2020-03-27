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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/news-list', 'NewsController@index')->name('news');
Route::get('/news/{id?}', 'NewsController@show');
Route::match(['post','put'], '/news/{id?}', 'NewsController@save');
Route::get('/news/{id}/publish', 'NewsController@publish');
Route::get('/news/{id}/unpublish', 'NewsController@unpublish');
Route::get('/news/{id}/delete', 'NewsController@delete');

Route::get('/events', 'EventsController@index')->name('events');

Route::get('/broadcast', 'BroadcastController@index')->name('broadcast');

Route::post('/applyadmin', 'HomeController@applyAdmin');
