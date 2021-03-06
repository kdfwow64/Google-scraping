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
Route::get('/info', 'MainscrapingController@getdetailInfo');
Route::get('/mail/send', 'MailController@send');
Route::get('/mail/template', 'MailController@index');
Route::get('/blacklist/manage', 'HomeController@blacklist');
Route::get('/blacklist/delete/{id}', 'HomeController@blacklistDelete');

Route::post('/home/scrape', 'MainscrapingController@searchwithKeyword');
Route::post('/home/getDomains', 'HomeController@getDomains');
Route::post('/home/getEmail', 'HomeController@getEmail');
Route::post('/mail/sendAll', 'MailController@sendAll');
Route::post('/mail/save', 'MailController@save');
Route::post('/blacklist/insert', 'HomeController@insert');

Auth::routes();

