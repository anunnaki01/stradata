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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/', function () {
        return view('dictionary.index');
    });
    Route::get('/dictionaryList', 'Web\DictionaryController@index')->name('dictionaryList');

    Route::get('/dictionaryListFilter', 'Web\DictionaryController@filter')->name('dictionaryFilter');

    Route::get('/', function () {
        return view('dictionary.index');
    });

    Route::get('/excel', 'Web\ExportController@excel')->name('exportExcel');


});