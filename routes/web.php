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
Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    //Crud Lapangan
    Route::resource('lapangan', 'LapanganController')->middleware('role:admin');

    //Crud Jadwal
    Route::resource('jadwal', 'JadwalController')->middleware('role:admin');;

    //Crud Transaksi
    Route::resource('transaksi', 'TransaksiController');
    Route::prefix('transaksi')->group(function () {
        Route::post('/upload', 'TransaksiController@upload')->middleware('role:member');
        Route::get('/invoice/{id}', 'TransaksiController@invoice')->middleware('role:member');
        Route::get('/update/{status}/{id}', 'TransaksiController@updateStatus')->middleware('role:admin');;
    });

    //CRUD Profile
    Route::resource('profiles', 'ProfileController');

    Route::get('/dashboard', function () {
        return view('index');
    });
});
    Route::get('/denied', function () {
    return view('denied');
});

    Route::get('/', function () {
    return view('index');
});