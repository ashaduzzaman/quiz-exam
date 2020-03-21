<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::group(['prefix' => 'admin'], function () {
    Route::resource('exam-list', 'ExamController');
    Route::resource('set-question', 'QuestionController');
});
// Route::resource('/admin', 'ExamController');
Route::auth();

Route::delete('/home', 'HomeController@index');

