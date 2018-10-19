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
Route::get('login/facebook', 'LoginController@redirectToFacebook');
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');
Route::get('login/vk', 'LoginController@redirectToVK');
Route::get('login/vk/callback', 'LoginController@handleVKCallback');
Route::get('userInfo', 'LoginController@UserInfo');
