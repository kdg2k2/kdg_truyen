<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('home', 'TruyenAPI');
Route::get('/home', 'TruyenAPI@home');
Route::get('/list', 'TruyenAPI@list');
Route::get('/list/{id}', 'TruyenAPI@listFilter');
Route::get('/category', 'TruyenAPI@category');
Route::get('/{slug}', 'TruyenAPI@detail');
Route::get('/{slug}/{id}', 'TruyenAPI@reading');
// Route::get('/api/home/{id}', 'TruyenAPI@show');

