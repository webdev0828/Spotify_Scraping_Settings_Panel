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

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'PlaylistController@index')->name('index');
Route::get('/home', 'PlaylistController@index')->name('name');
Route::post('/add', 'PlaylistController@add')->name('add');
Route::get('/delete/{id}', 'PlaylistController@delete')->name('delete');
Route::post('/update', 'PlaylistController@update')->name('update');
