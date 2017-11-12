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


Route::post('/insert','ResumeController@store');
Route::get('/Display','ResumeController@Display');
Route::post('/Update','ResumeController@Update');
Route::get('/', function () {
    return view('welcome');
});
