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


Route::get('/get_user', 'Authentication@getUser');

Route::get('/login', 'Authentication@getLoginForm');
Route::post('/login', 'Authentication@login');


Route::get('/register_business', 'Authentication@getRegisterBusinessForm');
Route::post('/register_business', 'Authentication@registerBusiness');

Route::get('/register_client', 'Authentication@getRegisterClientForm');
Route::post('/register_client', 'Authentication@registerClient');

Route::get('/professionals', 'BusinessController@index');
Route::get('/professionals/{id}', 'BusinessController@show');
