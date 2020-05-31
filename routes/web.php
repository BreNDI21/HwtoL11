<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('finance', 'FinanceController');

Route::resource('earning', 'EarningController');

Route::resource('spending', 'SpendingController');

Route::get('/Calculate', 'FinanceController@Calculate');

Route::post('/earning/create', 'EarningController@create');


