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
Route::get('/student', 'StudentController@index');
Route::post('/studentadd', 'StudentController@store');

Route::put('/studentupdate/{id}', 'StudentController@update');
Route::delete('/studentdelete/{id}', 'StudentController@delete');


////////////For message ///////////////////////////
Route::get('/message', 'MessageController@index');
Route::post('/messageadd', 'MessageController@store');

Route::put('/messageupdate/{id}', 'MessageController@update');
Route::delete('/messagedelete/{id}', 'MessageController@delete');

Route::get('/selectedmessage/{id}', 'MessageController@selectedmessage');
/////////////////////end for message////////////////////////////////