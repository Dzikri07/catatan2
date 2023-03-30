<?php

use App\Http\Controllers\laporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\TesController;
use App\http\Controllers\AksesorisController;
use App\Http\Controllers\LaporanBugController;



Route::get('/', [HomeController::class, 'index']);
Route::get('profile', [HomeController::class, 'profile']);
Route::get('contact', [HomeController::class, 'contact']);
Route::resource('produk', ProdukController::class,);
Route::resource('catatan', CatatanController::class,);
Route::get('/tambah', [CatatanController::class, 'tambah']);


//login
Route::get('/login',[UserController::class,'index'])->name('login');
Route::post('/login/cek',[UserController::class,'cekLogin'])->name('cekLogin');
route::get('/logout',[UserController::class,'logout'])->name('logout');

//tes simulasi try out
Route::resource('simulasi', SimulasiController::class,);
Route::resource('baju', BajuController::class,);

// route::get('catatan', [CatatanController::class, 'index'])->name('catatan');
Route::get('export/produk',[ProdukController::class, 'exportData'])->name('export-produk');
Route::post('produk/import',[ProdukController::class, 'importData'])->name('import-produk');

//pdf 
Route::get('laporan', [CatatanController::class, 'index']);
Route::resource('/laporan',laporanController::class);

route::get('cetak_catatan', [CatatanController::class,'cetak']);

Route::resource('tes', TesController::class,);


//ujikom
Route::resource('aksesoris', AksesorisController::class,);
Route::resource('LaporanBug', LaporanBugController::class,);
Route::get('export/LaporanBug',[LaporanBugController::class, 'exportData'])->name('export-produk');
Route::post('LaporanBug/import',[LaporanBugController::class, 'importData'])->name('import-produk');


