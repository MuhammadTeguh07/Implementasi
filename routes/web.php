<?php

use Illuminate\Support\Facades\Route;

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
Route::get('redirect/{driver}', 'Controller_login@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Controller_login@handleProviderCallback')->name('login.callback');

Route::get('/login', 'Controller_login@index');
Route::get('/login/auth/google', 'Controller_login@authGoogle');
Route::get('/login/auth/google/callback', 'Controller_login@authGoogleCallback');

Route::get('/dashboard', 'Controller_home@index');

Route::get('/customer', 'Controller_customer@index');
Route::get('/customer/create1', 'Controller_customer@getProvinsi1'); 
Route::get('/customer/create1/getKota/{id}','Controller_customer@getKota1');
Route::get('/customer/create1/getKecamatan/{id}','Controller_customer@getKecamatan1');
Route::get('/customer/create1/getKelurahan/{id}','Controller_customer@getKelurahan1');
Route::get('/customer/insert1', 'Controller_customer@insert1');

Route::get('/customer/create2', 'Controller_customer@getProvinsi2');
Route::get('/customer/create2/getKota/{id}','Controller_customer@getKota2');
Route::get('/customer/create2/getKecamatan/{id}','Controller_customer@getKecamatan2');
Route::get('/customer/create2/getKelurahan/{id}','Controller_customer@getKelurahan2');
Route::get('/customer/insert2', 'Controller_customer@insert2');

Route::get('/barang', 'Controller_barang@index');
Route::get('/barang/insert', 'Controller_barang@insert');
Route::get('/barang/edit', 'Controller_barang@edit');
Route::get('/barang/print/{id}', 'Controller_barang@print');
Route::get('/barang/scan', 'Controller_barang@scan');
Route::get('/barang/alert/{id}', 'Controller_barang@alert');

Route::get('/toko', 'Controller_toko@index');
Route::get('/toko/create', 'Controller_toko@create');
Route::get('/toko/insert', 'Controller_toko@insert');
Route::get('/toko/print/{id}', 'Controller_toko@print');
Route::get('/toko/scan', 'Controller_toko@scan');
Route::post('/toko/req', 'Controller_toko@request');

Route::get('/excel', 'Controller_import@index');
Route::post('/excel/import', 'Controller_import@dataImport');
Route::get('/excel/export', 'Controller_import@dataExport');

// Scoreboard
Route::get('/scoreboard', 'Controller_scoreboard@scoreboard_index');
Route::get('/scoreboard-controller', 'Controller_scoreboard@controller_index');
Route::post('/scoreboard-controller/update', 'Controller_scoreboard@controller_store');
Route::get('/messages', 'Controller_scoreboard@message');

