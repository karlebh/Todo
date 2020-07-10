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

Route::get('/', 'TodoController@index')->name('home');


Route::get('todo', 'TodoController@index');
Route::post('todo', 'TodoController@store');
Route::patch('todo/{todo}', 'TodoController@update');
Route::post('todo/{todo}', 'TodoController@delete');
Route::get('search', 'TodoController@search');

