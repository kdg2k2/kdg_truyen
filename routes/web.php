<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');

Route::get('/login', 'UserController@login');
Route::post('/user/login', 'UserController@checkLogin');
Route::get('/logged', 'UserController@logged');
Route::get('/logout', 'UserController@logout');

Route::get('/forget-password', 'UserController@forget');
Route::post('/forget-password/post', 'UserController@forgetPost');
Route::get('/forget-mail/{id}/{token}', 'UserController@getPass');
Route::post('/forget-mail/{id}/{token}', 'UserController@postGetPass');

Route::group(['prefix' => 'admin'], function (){
    //Truyện
    Route::get('/truyen-manager', 'TruyenController@index');
    Route::get('/truyen/create', 'TruyenController@create');
    Route::post('/truyen/store', 'TruyenController@store');
    Route::get('/truyen/show/{id}', 'TruyenController@show');
    Route::get('/truyen/{id}/edit', 'TruyenController@edit');
    Route::post('/truyen/{id}/update', 'TruyenController@update');
    Route::post('/truyen/{id}/delete', 'TruyenController@destroy');
    
    //Tap
    Route::get('/tap-manager', 'TapController@index');
    Route::get('/tap/create', 'TapController@create');
    Route::post('/tap/store', 'TapController@store');
    Route::get('/tap/show/{id}', 'TapController@show');
    Route::get('/tap/{id}/edit', 'TapController@edit');
    Route::post('/tap/{id}/update', 'TapController@update');
    Route::post('/tap/{id}/delete', 'TapController@destroy');
    
    // Thể loại
    Route::get('/theloai-manager', 'TheloaiController@index');
    Route::get('/theloai/create', 'TheloaiController@create');
    Route::post('/theloai/store', 'TheloaiController@store');
    Route::get('/theloai/show/{id}', 'TheloaiController@show');
    Route::get('/theloai/{id}/edit', 'TheloaiController@edit');
    Route::post('/theloai/{id}/update', 'TheloaiController@update');
    Route::post('/theloai/{id}/delete', 'TheloaiController@destroy');
    
    // Tác giả
    Route::get('/tacgia-manager', 'TacgiaController@index');
    Route::get('/tacgia/create', 'TacgiaController@create');
    Route::post('/tacgia/store', 'TacgiaController@store');
    Route::get('/tacgia/show/{id}', 'TacgiaController@show');
    Route::get('/tacgia/{id}/edit', 'TacgiaController@edit');
    Route::post('/tacgia/{id}/update', 'TacgiaController@update');
    Route::post('/tacgia/{id}/delete', 'TacgiaController@destroy');
    
    // User
    Route::get('/user-manager', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/store', 'UserController@store');
    Route::get('/user/show/{id}', 'UserController@show');
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::post('/user/{id}/delete', 'UserController@destroy');
    
    
});

Route::get('/{slug}', 'HomeController@showTruyen');
Route::get('/{slug}/{id}', 'HomeController@showTap');
