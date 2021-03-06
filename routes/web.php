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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/message/{id}', function () {
    return view('welcome');
});




Route::post('/send-message','ChatroomController@sendMessage');
Route::get('/get-message/{id}','ChatroomController@showMessages');
Route::get('/last-message/{room_id}','ChatroomController@lastMessage');
Route::get('/get-prevs-messages','ChatroomController@getPrevsMessages');

