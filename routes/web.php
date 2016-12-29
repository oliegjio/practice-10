<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//    return view('welcome');
// });

Route::get('/', 'HomeController@index');

Auth::routes();

Route::post('/tasks', 'TasksController@store');
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('tasks/delete/{id}', 'TasksController@destroy');
Route::get('/tasks/{id}/edit', 'TasksController@edit');
Route::post('/tasks/{id}', 'TasksController@update');
