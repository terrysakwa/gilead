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

Route::get('patient-exists', ['as' => 'patientExists', 'uses' => 'PatientController@checkIfPatientExists']);


Route::get('patient-records/{patient_id}', ['as' => 'patientRecords', 'uses' => 'PatientController@show']);

Route::post('patient-records/{patient_id}', ['as' => 'savePatientRecord', 'uses' => 'PatientController@store']);

Route::post('update-records/{patient_id}', ['as' => 'updatePatientRecord', 'uses' => 'PatientController@update']);

Route::post('delete-records/{record_id}', ['as' => 'deleteRecord', 'uses' => 'PatientController@deleteRecord']);

Route::post('change-request/{record_id}', ['as' => 'sendChangeRequest', 'uses' => 'PatientController@changeRequest']);

Route::get('report/{patient_id}', ['as' => 'generateReport', 'uses' => 'PatientController@generateReport']);


//Route::get('/home', 'HomeController@index');
