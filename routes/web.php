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

Auth::routes();
// Route::resource('user', 'UserController');
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@admin');
    Route::get('/home', 'HomeController@index')->name('home');

    //Crud Lapangan
    Route::resource('lapangan', 'LapanganController');

    //Crud Jadwal
    Route::resource('jadwal', 'JadwalController');

    //Crud Transaksi
    Route::resource('transaksi', 'TransaksiController');
    Route::post('transaksi/upload', 'TransaksiController@upload');

    Route::get('/dashboard', function () {
        return view('index');
    });
});