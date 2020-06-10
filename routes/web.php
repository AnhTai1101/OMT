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

Route::get('/all', 'repositoryController@all')->name('home');
Route::get('/select', 'repositoryController@select');
Route::post('/add', 'repositoryController@add')->name('add-post');
Route::get('/delete/{guid}', 'repositoryController@del')->name('delete');
Route::post('/update','repositoryController@update')->name('update-post');
