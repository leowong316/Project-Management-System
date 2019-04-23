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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', function () {
    return view('admin_template');
});

Route::get('test', 'TestController@index');

//Project
Route::Resource('projects','ProjectsController');

//User
Route::Resource('users','UsersController');
Route::get('/{project}/users','UsersController@show');

//ProjectTasks
Route::Resource('tasks','ProjectTasksController');
Route::get('/tasks/{project}/create','ProjectTasksController@create');
Route::get('/{project}/tasks','ProjectTasksController@show');
Route::post('/{project}/tasks','ProjectTasksController@store');







