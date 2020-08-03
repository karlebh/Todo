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

Route::resource('todo', 'TodoController');
Route::get('search', 'SearchController@search')->name('todo.search');
Route::get('restore', 'TodoController@restoreTodo')->name('restore');

// Route::get('todo/create', 'TodoController@create');
// Route::post('todo', 'TodoController@store');
// Route::patch('todo/{todo}', 'TodoController@update');
// Route::post('todo/{todo}', 'TodoController@delete');

