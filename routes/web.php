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

//get view login
Route::get('/', 'LoginController@getLogin')->middleware(CheckSessionBlockLogin::class)->name('Login_Index');;
// Proses login system
Route::post('/home', 'LoginController@postLogin')->name('Login_Post');
// Untuk redirect ke home melalui URL
Route::get('/home', 'LoginController@getHome')->middleware(CheckSessionLogin::class)->name('Home_Index');
// logout user
Route::get('/logout', 'LoginController@logout')->name('User_Logout');
// View register user
Route::get('/user/register', 'UserController@index')->middleware(CheckSessionBlockLogin::class)->name('User_Registration');
// Store register user
Route::post('/user/store', 'UserController@store')->middleware(CheckSessionBlockLogin::class)->name('User_Store');
// View update user/change password
Route::get('/user/{id}/edit', 'UserController@edit')->middleware(CheckSessionLogin::class)->name('User_Edit');
// update user
Route::put('/user/{id}/update', 'UserController@update')->middleware(CheckSessionLogin::class)->name('User_Update');

// View index Master Ekspedisi
Route::get('/ekspedisi/index', 'EkspedisiController@index')->middleware(CheckSessionLogin::class)->name('Ekspedisi_Index');
//Datatable Ekspedisi
Route::get('/table/ekspedisi', 'EkspedisiController@dataTable')->middleware(CheckSessionLogin::class)->name('Ekspedisi_Datatable');

// View index Scan Resi
Route::get('/scan_resi/index', 'ScanResiController@index')->middleware(CheckSessionLogin::class)->name('ScanResi_Index');
// Store Scan Resi
Route::post('/scan_resi/store', 'ScanResiController@store')->middleware(CheckSessionLogin::class)->name('ScanResi_Store');
