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
Route::resource('balance', 'BalanceController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blackjack','BlackjackController@index')->name('blackjack');
Route::put('/updatecash','BlackjackController@updatecash');

Route::get('/slots','SlotsController@index')->name('slots');





