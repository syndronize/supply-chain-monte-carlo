<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;

Route::middleware(['belum_login'])->group(function () {
    Route::get('/','App\Http\Controllers\DashboardController@login')->name('login');
    Route::post('aksilogin','App\Http\Controllers\DashboardController@aksilogin')->name('login-admin');
    Route::post('register-user','App\Http\Controllers\DashboardController@aksiregister')->name('saveuser');
    Route::get('register','App\Http\Controllers\DashboardController@register')->name('register');
});

Route::middleware(['sudah_login'])->group(function () {

    Route::get('/home','App\Http\Controllers\DashboardController@index')->name('home');
    Route::get('/logout','App\Http\Controllers\DashboardController@logout')->name('logout');

    //User
    Route::get('/user','App\Http\Controllers\UserController@index')->name('user');
    Route::get('/user/create','App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/user','App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/user/{user}','App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{user}','App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/user/delete/{user}','App\Http\Controllers\UserController@destroy')->name('user.delete');

    //Analisa
    Route::get('/analisa','App\Http\Controllers\AnalisaController@index')->name('analisa');
    Route::get('/analisa-2','App\Http\Controllers\AnalisaController@step2')->name('step2analisa');
    Route::get('/analisa-3','App\Http\Controllers\AnalisaController@step3')->name('step3analisa');
    Route::get('/analisa-4','App\Http\Controllers\AnalisaController@step4')->name('step4analisa');
    Route::get('/analisa-5','App\Http\Controllers\AnalisaController@randomnumber')->name('randomnumber');
    Route::get('/analisa-hasil','App\Http\Controllers\AnalisaController@hasil')->name('hasil-analisa');
    Route::get('/analisa/create','App\Http\Controllers\AnalisaController@create')->name('analisa.create');
    Route::post('/analisa','App\Http\Controllers\AnalisaController@store')->name('analisa.store');
    Route::get('/analisa/{analisa}','App\Http\Controllers\AnalisaController@edit')->name('analisa.edit');
    Route::put('/analisa/{analisa}','App\Http\Controllers\AnalisaController@update')->name('analisa.update');
    Route::get('/analisa/delete/{analisa}','App\Http\Controllers\AnalisaController@destroy')->name('analisa.delete');
    
    //Produk
    Route::get('/produk','App\Http\Controllers\ProdukController@index')->name('produk');
    Route::get('/produk/create','App\Http\Controllers\ProdukController@create')->name('produk.create');
    Route::post('/produk','App\Http\Controllers\ProdukController@store')->name('produk.store');
    Route::get('/produk/{produk}','App\Http\Controllers\ProdukController@edit')->name('produk.edit');
    Route::put('/produk/{produk}','App\Http\Controllers\ProdukController@update')->name('produk.update');
    Route::get('/produk/delete/{produk}','App\Http\Controllers\ProdukController@destroy')->name('produk.delete');
    
    //Sales
    Route::get('/sales','App\Http\Controllers\SalesController@index')->name('sales');
    Route::get('/sales-cetak','App\Http\Controllers\SalesController@cetak')->name('sales.cetak');
    Route::get('/sales/create','App\Http\Controllers\SalesController@create')->name('sales.create');
    Route::post('/sales','App\Http\Controllers\SalesController@store')->name('sales.store');
    Route::get('/sales/{sales}','App\Http\Controllers\SalesController@edit')->name('sales.edit');
    Route::put('/sales/{sales}','App\Http\Controllers\SalesController@update')->name('sales.update');
    Route::get('/sales/delete/{sales}','App\Http\Controllers\SalesController@destroy')->name('sales.delete');
    
    //Transaksi
    Route::get('/transaksi','App\Http\Controllers\TransaksiController@index')->name('transaksi');
    Route::get('/transaksi-cetak','App\Http\Controllers\TransaksiController@cetak')->name('transaksi.cetak');
    Route::get('/transaksi-cari','App\Http\Controllers\TransaksiController@cari')->name('transaksi.cari');
    Route::get('/transaksi/create','App\Http\Controllers\TransaksiController@create')->name('transaksi.create');
    Route::post('/transaksi','App\Http\Controllers\TransaksiController@store')->name('transaksi.store');
    Route::post('/transaksi-temp','App\Http\Controllers\TransaksiController@storetemp')->name('temp.store');
    Route::get('/transaksi/{transaksi}','App\Http\Controllers\TransaksiController@edit')->name('transaksi.edit');
    Route::put('/transaksi/{transaksi}','App\Http\Controllers\TransaksiController@update')->name('transaksi.update');
    Route::get('/transaksi/delete/{transaksi}','App\Http\Controllers\TransaksiController@destroy')->name('transaksi.delete');
    Route::get('/temp/deletetemp/{temp}','App\Http\Controllers\TransaksiController@deletetemp')->name('temp.delete');
    Route::post('/transaksi/detail','App\Http\Controllers\TransaksiController@detail')->name('transaksi.detail');
    Route::post('/transaksi/detail-transaksi','App\Http\Controllers\TransaksiController@detailtransaksi')->name('transaksi.detail.tr');

    //Permintaan
    Route::get('/permintaan','App\Http\Controllers\PermintaanController@index')->name('permintaan');
    Route::get('/permintaan/create','App\Http\Controllers\PermintaanController@create')->name('permintaan.create');
    Route::post('/permintaan','App\Http\Controllers\PermintaanController@store')->name('permintaan.store');
    Route::get('/permintaan/{permintaan}','App\Http\Controllers\PermintaanController@edit')->name('permintaan.edit');
    Route::put('/permintaan/{permintaan}','App\Http\Controllers\PermintaanController@update')->name('permintaan.update');
    Route::get('/permintaan/delete/{permintaan}','App\Http\Controllers\PermintaanController@destroy')->name('permintaan.delete');

    //temp


});