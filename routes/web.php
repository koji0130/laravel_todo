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

Route::get('/top','TaskController@index');

Route::post('/task','TaskController@store');

Route::get('/task/{id}/edit','TaskController@edit');

Route::post('/update','TaskController@update');

Route::get('/task/{id}/delete','TaskController@delete');

Route::get('/tasked/{id}','TaskController@tasked');

Route::get('/finished/task','TaskController@finished');

Route::get('/task/{id}/restore','TaskController@restore');

Route::get('/search','TaskController@search');
