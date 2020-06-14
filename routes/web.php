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
    Route::post('/delete', 'repositoryController@del')->name('delete');
    Route::post('/update','repositoryController@update')->name('update-post');
    Route::post('/search', 'repositoryController@search')->name('search');
    Route::get('/get-all', 'repositoryController@getAll')->name('fn-get-all');
    Route::post('/search2', 'repositoryController@search2')->name('search2');
    Route::get('/test', 'repositoryController@test')->name('tai-test');
    Route::post('/post-test', 'repositoryController@postTest')->name('post-test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace'=>'Tai'], function () {
    Route::get('/login', 'TaiLoginController@home')->name('tai-login');
    Route::get('/trangchu', 'TaiLoginController@index')->name('tai-trangchu');
    Route::post('/post-login', 'TaiLoginController@postLogin')->name('tai-post-login');
    Route::get('/logout','TaiLoginController@logout')->name('logout');
});

// test

