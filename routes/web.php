<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSessionLogin;
use App\Http\middleware\CheckSessionBlockLogin;

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

//CheckSessionBlockLogin = untuk return view home jika masih ada session
//CheckSessionLogin = Untuk return view login jika tidak ada session

//Tampilan Awal
Route::get('/', 'LoginController@getLogin')->middleware(CheckSessionBlockLogin::class);
// Proses login system
Route::post('/home', 'LoginController@postLogin');
// Untuk redirect ke home melalui URL
Route::get('/home', 'LoginController@getHome');
// Untuk redirect ke home melalui URL
Route::get('/logout', 'LoginController@logout');
// View register user
Route::get('/user/register', 'UserController@index')->middleware(CheckSessionBlockLogin::class);
// Store register user
Route::post('/user/store', 'UserController@store')->middleware(CheckSessionBlockLogin::class);
