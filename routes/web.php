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
  return view('welcome', ['token' => str_random(32)]);
});

Route::post('/begin-application', 'ApplicationController@beginApplication');

Route::get('/join-step-one/{token}', 'ApplicationController@stepOne');
Route::post('/join-step-one/{token}', 'ApplicationController@saveStepOne');

Route::get('/join-step-two/{token}', 'ApplicationController@stepTwo');
Route::post('/join-step-two/{token}', 'ApplicationController@saveStepTwo');

Route::get('/join-step-three/{token}', 'ApplicationController@stepThree');
Route::post('/join-step-three/{token}', 'ApplicationController@saveStepThree');

Route::get('/join-step-four/{token}', 'ApplicationController@stepFour');
Route::post('/join-step-four/{token}', 'ApplicationController@saveStepFour');

Route::get('/join-step-five/{token}', 'ApplicationController@stepFive');
Route::post('/join-step-five/{token}', 'ApplicationController@saveStepFive');
