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
Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/donasi/{id}', 'HomeController@show')->name('detail_donasi');
Route::post('/donasi/kirim/{id}', 'HomeController@kirimDonasi')->name('kirim_donasi');
Route::get('/donasi/{id}/berita/{berita}', 'HomeController@detailBerita')->name('detail_berita');

// Route auth
Auth::routes();

//Rote verifikasi email
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser')->name('verifiy_user');

// Route kirim saran
Route::get('/reload-captcha', 'SaranController@reloadCaptcha');
Route::get('/saran', 'SaranController@create')->name('create_saran_umum');
Route::post('/saran-post', 'SaranController@store')->name('store_saran_umum');

// Route untuk admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-users', 'can:verified-users')->group(function() {
    Route::resource('/users', 'UserController');
    Route::resource('/profesis', 'RefProfesiController');
    Route::resource('/agamas', 'RefAgamaController');
    Route::resource('/vendors', 'RefVendorSavingController');
    Route::resource('/rekenings', 'RekeningController');
    Route::resource('/konten-blogs', 'KontenBlogController');
    Route::resource('/saran', 'SaranController');
});

// Route untuk relawan
Route::namespace('Relawan')->prefix('relawan')->name('relawan.')->middleware('can:relawan-users', 'can:verified-users')->group(function() {
    Route::resource('/programs', 'ProgramController');
    Route::resource('/program-donaturs', 'ProgramDonaturController');
    Route::resource('/program-fundraisers', 'ProgramFundraiserController');
    Route::get('/program/{id}/program-beritas', ['as' => 'program-beritas.index', 'uses' => 'ProgramBeritaController@index']);
    Route::get('/program/{id}/program-beritas/create', ['as' => 'program-beritas.create', 'uses' => 'ProgramBeritaController@create']);
    Route::resource('/program-beritas', 'ProgramBeritaController', ['except' => ['index', 'create']]);
});

// Route untuk fundraiser
Route::namespace('Fundraiser')->prefix('fundraiser')->name('fundraiser.')->middleware('can:fundraiser-users', 'can:verified-users')->group(function() {
    Route::get('/', 'FundraiserDashboardController@index')->name('index');
});

// Route Logout
Route::get('/logout', function(){
    // logout user
    Auth::logout();
    // redirect to homepage
    return redirect('/');
});
