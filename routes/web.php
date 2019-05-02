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
use Carbon\Carbon;

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

//ProjectTasks
Route::Resource('tasks','ProjectTasksController');
Route::get('/tasks/{project}/create','ProjectTasksController@create');
Route::get('/{project}/tasks','ProjectTasksController@show');
Route::post('/{project}/tasks','ProjectTasksController@store');

//StaffProject
Route::Resource('staffprojects', 'StaffProjectsController');

//StaffProjectTasks
// Route::get('{project}/stafftasks','StaffProjectTasksController@create');
// Route::post('{project}/stafftasks','StaffProjectTasksController@store');

//StaffWorks
Route::resource('staffworks', 'StaffWorksController');

//Works
Route::resource('works', 'WorksController');
Route::get('/works/{project}/create','WorksController@create');
Route::post('/works/{project}','WorksController@store');

Route::get('time',function (){
    // return Carbon::now();
    return 2.5 * 60;
});




