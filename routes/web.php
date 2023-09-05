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

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', 'HomeController@index');

//Truyện
Route::resource('truyen', 'TruyenController');
Route::get('/truyen/{slug}/{id}', 'TruyenController@doc_chap_nao');
// Route::get('/danh-sach', 'TruyenController@danhSach');

//Tap
Route::resource('tap', 'TapController');

// Thể loại
Route::resource('the-loai', 'TheloaiController');
Route::get('/the-loai-manager', 'TheloaiController@index');

// Tác giả
Route::resource('tac-gia', 'TacgiaController');
Route::get('/tac-gia-manager', 'TacgiaController@index');

// User
Route::resource('user', 'UserController');
Route::get('/user-manager', 'UserController@index');

Route::get('/login', 'UserController@login');
Route::post('/user/login', 'UserController@checkLogin');
Route::get('/logged', 'UserController@logged');
Route::get('/logout', 'UserController@logout');

Route::get('/forget-password', 'UserController@forget');
Route::post('/forget-password/post', 'UserController@forgetPost');
Route::get('/forget-mail/{id}/{token}', 'UserController@getPass');
Route::post('/forget-mail/{id}/{token}', 'UserController@postGetPass');
