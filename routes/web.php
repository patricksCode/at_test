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

Route::post('/submit-answer', 'HomeController@submitAnswer')->name('ajaxAnswer');

Route::get('/graph-results', 'GraphController@index')->name('ajaxAnswer');

Route::get('/js/chart-config.js', 'GraphController@graphJs')->name('chartConlfigJs');
