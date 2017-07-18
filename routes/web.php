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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/dashboard/test', 'DashboardController@test');

Route::get('/refer', 'HomeController@test');

Route::resource('dashboard/lecturers', 'LecturersController');

Route::resource('dashboard/students', 'StudentsController');

//Route::get('lecturers/create/{id}', 'LecturersController@create');
//Route::get('lecturers/create', 'LecturersController@create');

