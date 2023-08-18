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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'SearchController@search')->name('home');
Route::get('/','SearchController@search');
Route::post('/index','SearchController@index');

Route::apiResource('/tutors','SearchController');

Route::resource('/user','UserController');
// Route::resource('/tutor','TutorController');