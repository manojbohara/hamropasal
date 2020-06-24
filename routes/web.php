<?php

use Illuminate\Support\Facades\Route;
use App\Admin;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/merchant', 'Auth\LoginController@showMerchantLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/merchant', 'Auth\RegisterController@showMerchantRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/merchant', 'Auth\LoginController@MerchantLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/merchant', 'Auth\RegisterController@createMerchant');
Route::get('merchant/dashboard','BackendController\MerchantController@index')->name('merchant')->middleware('auth:merchant');
Route::get('admin/dashboard','BackendController\AdminController@index')->name('admin')->middleware('auth:admin');
