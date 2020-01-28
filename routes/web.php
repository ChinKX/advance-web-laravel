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
Route::get('/division/create', 'DivisionController@create')
    ->name('division.create');
Route::post('/division', 'DivisionController@store')
    ->name('division.store');
Route::get('/division', 'DivisionController@index')
    ->name('division.index');
Route::get('/division/{id}', 'DivisionController@show')
    ->name('division.show');
Route::get('/division/{id}/edit', 'DivisionController@edit')
    ->name('division.edit');
Route::put('/division/{id}', 'DivisionController@update')
    ->name('division.update');
