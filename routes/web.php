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

Route::get('/','PageController@index');
Route::get('/search','PageController@word_search')->name('word.search');
Route::get('/verb-form','PageController@verb_form');
Route::get('/verb-form/search','PageController@ver_formSearch')->name('verb-form.search');
