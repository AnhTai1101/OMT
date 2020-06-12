<?php

use Illuminate\Routing\RouteGroup;
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

Route::group(['prefix' => 'backend','middleware'=>'taiLogin'], function () {
    Route::get('/all', 'repositoryController@all')->name('home1');
    Route::get('/select', 'repositoryController@select');
    Route::post('/add', 'repositoryController@add')->name('add-post');
    Route::get('/delete/{guid}', 'repositoryController@del')->name('delete');
    Route::post('/update','repositoryController@update')->name('update-post');
    Route::post('/search', 'repositoryController@search')->name('search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace'=>'Tai'], function () {
    Route::get('/login', 'TaiLoginController@home')->name('tai-login');
    Route::get('/trangchu', 'TaiLoginController@index')->name('tai-trangchu');
    Route::post('/post-login', 'TaiLoginController@postLogin')->name('tai-post-login');
    Route::get('/logout','TaiLoginController@logout')->name('logout');
});
