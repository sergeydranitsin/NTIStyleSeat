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

Route::post('/login/email', 'Authentication@login');

Route::get('/register_businessSN/{provider}', 'Authentication@BusinessSN');

Route::get('/register_clientSN/{provider}', 'Authentication@ClientSN');
Route::get('/logout', 'Authentication@logout');


//восстановление пароля
Route::get('/reset_pass', function () {
    return view('email');
});
Auth::routes();
