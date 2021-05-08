<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Homepage (non-login)
Route::get('/', function () {
    return view('welcome');
});

// Route auth
Auth::routes();

// Route untuk admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-users')->group(function() {
    Route::get('/index', 'AdminDashboardController@index')->name('index');
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});

// Route untuk relawan
Route::namespace('Relawan')->prefix('relawan')->name('relawan.')->middleware('can:relawan-users')->group(function() {
    Route::get('/index', 'RelawanDashboardController@index')->name('index');
});

// Route Logout
Route::get('/logout', function(){
    //logout user
    Auth::logout();
    // redirect to homepage
    return redirect('/');
});