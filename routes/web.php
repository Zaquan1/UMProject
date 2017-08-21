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

Route::resource('dashboard/lecturers', 'LecturersController');

Route::resource('dashboard/students', 'StudentsController');

Route::resource('dashboard/mentor_mentee/evaluation', 'Mm_evalsController');

Route::get('dashboard/mentor_mentee/search', ['as'=>'mentor_mentee.data', 'uses' =>'Mm_assignmentsController@anyData']);

Route::resource('dashboard/mentor_mentee', 'Mm_assignmentsController');

Route::get('dashboard/datatable/{cohort}', 'DataTableController@getLectFilter')->name('dataTable.getDataLFC');

Route::get('dashboard/datatable/getLecturers', 'DataTableController@getLect')->name('dataTable.getDataL');

Route::post('dashboard/datatable/update', 'DataTableController@updateMm_assignment')->name('dataTable.MmUpdate');

Route::get('dashboard/datatable/test/{cohort}', 'DataTableController@test');

//Route::resource('dashboard/mentor_mentee', 'Mm_assignmentsController');

//Route::get('lecturers/create/{id}', 'LecturersController@create');
//Route::get('lecturers/create', 'LecturersController@create');

Route::get('/refer', 'HomeController@refer');

Route::get('/test', 'HomeController@test')->name('test');

Route::get('/dashboard/profile/{theName}', 'ProfileController@goToProfile');

Route::resource('/dashboard/mentor_evaluation', 'MentorEvaluationFormController');

Route::resource('/dashboard/mentee_evaluation', 'MenteeEvaluationFormController');
