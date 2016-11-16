<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');

Route::auth();

Route::post('register-patient', 'RegisterPatientController@store');

Route::get('search-patient', ['as' => 'search', 'uses' => 'HomeController@search']);

Route::get('patient-records/{patient_id}', ['as' => 'patientRecords', 'uses' => 'PatientController@show']);

Route::post('patient-records/{patient_id}', ['as' => 'savePatientRecord', 'uses' => 'PatientController@store']);

//Route::get('/home', 'HomeController@index');
