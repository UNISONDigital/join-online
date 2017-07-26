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

Route::get('/join-step-one', function () {
  return view('join-step-one');
});

Route::get('/join-step-two', function () {
  return view('join-step-two');
});

Route::get('/join-step-three', function () {
  return view('join-step-three');
});

Route::get('/join-step-four', function () {
  return view('join-step-four');
});

Route::get('/join-step-five', function () {
  return view('join-step-five');
});
