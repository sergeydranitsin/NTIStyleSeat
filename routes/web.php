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

Route::get('login/facebook', 'Authentication@redirectToFacebook');
Route::get('login/vk', 'Authentication@redirectToVK');
Route::get('userInfo/', 'Authentication@UserInfo');


Route::get('/get_user', 'Authentication@getUser');

Route::post('/login/email', 'Authentication@login');
Route::post('/register/emailClient', 'Authentication@registerClient');

Route::get('/register_businessSN/{provider}', 'Authentication@BusinessSN');

Route::get('/register_clientSN/{provider}', 'Authentication@ClientSN');
Route::get('/logout', 'Authentication@logout');
