<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\SimulasiController;




Route::get('/', [HomeController::class, 'index']);
Route::get('profile', [HomeController::class, 'profile']);
Route::get('contact', [HomeController::class, 'contact']);
Route::resource('produk', ProdukController::class,);
Route::resource('catatan', CatatanController::class,);

Route::get('tambah', [CatatanController::class, 'tambah']);

Route::resource('simulasi', SimulasiController::class,);
// route::get('catatan', [CatatanController::class, 'index'])->name('catatan');
Route::get('export/produk',[ProdukController::class, 'exportData'])->name('export-produk');
Route::post('produk/import',[ProdukController::class, 'importData'])->name('import-produk');

//pdf 
Route::get('/cetak-laporan', 'LaporanController@cetakLaporan');
