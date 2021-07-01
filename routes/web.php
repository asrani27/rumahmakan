<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HasilUjiController;
use App\Http\Controllers\KustomerController;
use App\Http\Controllers\PesanUjiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StatusUjiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SertifikatController;


Route::get('/', function(){
    return view('welcome');
});
Route::get('/pesansekarang', [PesananController::class, 'loginPelanggan']);

Route::get('/register_pelanggan', [LoginController::class, 'register']);
Route::post('/register_pelanggan', [LoginController::class, 'storeRegister']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', function(){
    return view('login');
});


Route::group(['middleware' => ['auth', 'role:kasir|pembeli']], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::group(['middleware' => ['auth', 'role:kasir']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/transaksi', [TransaksiController::class, 'index']);
        Route::get('/transaksi/{id}/bayar', [TransaksiController::class, 'bayar']);
        Route::get('/transaksi/{id}/nota', [TransaksiController::class, 'nota']);
        Route::post('/pembayaran/transaksi/{id}', [TransaksiController::class, 'storeBayar']);
        Route::resource('meja', MejaController::class);
        Route::resource('makanan', MakananController::class); 
        Route::get('/laporan', [LaporanController::class, 'index']);    
        Route::get('/transaksi/cetak', [LaporanController::class, 'cetak']);  
        Route::get('/transaksi/detail/cetak', [LaporanController::class, 'detailcetak']);    
    });
});


Route::group(['middleware' => ['auth', 'role:pembeli']], function () {
    Route::get('/pesansekarang/{id}/add', [PesananController::class, 'storeMakanan']);
    Route::get('/home/batalkan', [PesananController::class, 'batalkan']);
    //Route::get('/pesansekarang', [PesananController::class, 'pesananPelanggan']);
    Route::post('/pesansekarang2', [PesananController::class, 'storePelanggan']);
    Route::get('/pesansekarang2', [PesananController::class, 'dataPesananPelanggan']);
    Route::post('/home/selesai', [PesananController::class, 'selesaiPesan']);
    Route::get('/pesanan/selesai', [PesananController::class, 'dataPesanan']);
    Route::get('/home/pesansekarang', [PesananController::class, 'dataPesananPelanggan']);
});