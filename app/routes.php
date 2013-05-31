<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('download', 'HomeController@getDownload');

Route::post('form',  array('before' => 'csrf','uses'=>'HomeController@postIndex'));
Route::post('upload', 'HomeController@postUpload');
