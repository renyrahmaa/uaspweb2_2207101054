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
//view
Route::get('/musik', 'MusikController@index');

//create
Route::get('/musik/create', 'MusikController@create'); 
Route::post('/musik', 'MusikController@store');

//update
Route::get('musik/{id}/edit', 'MusikController@edit'); 
Route::patch('musik/{id}', 'MusikController@update');

//delete
Route::delete('musik/{id}', 'MusikController@destroy');

Route::get('/musik/search', 'MusikController@search')->name('search');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
