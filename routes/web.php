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


Route::get('/profile', function () {
    return view('profile');
});
Route::get('/report', function () {
    return view('reporting');
});
Route::get('/get_user', 'Authentication@getUser');

Route::get('/login', 'Authentication@getLoginForm');
Route::post('/login', 'Authentication@login');


Route::get('/register_business', 'Authentication@getRegisterBusinessForm');
Route::post('/register_business', 'Authentication@registerBusiness');

Route::get('/register_client', 'Authentication@getRegisterClientForm');
Route::post('/register_client', 'Authentication@registerClient');

Route::get('/professionals', 'BusinessController@index')->name("professionals.index");
Route::get('/professionals/{businessUser}', 'BusinessController@show')->name("professionals.show");
Route::get('/professionals/{businessUser}/edit', 'BusinessController@edit')->name("professionals.edit");
Route::patch('/professionals/{businessUser}', 'BusinessController@update')->name("professionals.update");

Route::get('login/facebook', 'Authentication@redirectToFacebook');
Route::get('login/vk', 'Authentication@redirectToVK');

Route::post('/login/email', 'Authentication@login');

Route::get('/register_businessSN/{provider}', 'Authentication@BusinessSN');

Route::get('/register_clientSN/{provider}', 'Authentication@ClientSN');
Route::get('/logout', 'Authentication@logout');


//восстановление пароля
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
