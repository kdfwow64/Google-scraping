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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/scrape', 'MainscrapingController@searchwithKeyword');
Route::get('/info', 'MainscrapingController@getdetailInfo');
Route::get('/test', 'MainscrapingController@test');
Route::get('/home/get', 'HomeController@get')->name('get');

Auth::routes();

