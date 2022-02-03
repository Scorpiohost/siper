<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['keuangan'])->group(function () {
    //keuangan
    Route::get('/keuangan', [Controllers\keuangan\KeuanganController::class, 'index']);
    Route::get('/keuangan/tambah', [Controllers\keuangan\KeuanganController::class, 'create']);
    route::post('/keuangan/tambah', [Controllers\keuangan\KeuanganController::class, 'store']);
    Route::get('/keuangan/edit/{tcode}', [Controllers\keuangan\KeuanganController::class, 'edit']);
    Route::post('/keuangan/edit/{tcode}', [Controllers\keuangan\KeuanganController::class, 'update']);
    Route::get('/keuangan/delete/{tcode}', [Controllers\keuangan\KeuanganController::class, 'destroy']);
    Route::get('/keuangan/barang', [Controllers\keuangan\KeuanganController::class, 'masuk']);
});


Route::middleware(['gudang'])->group(function () {
    //pergudangan
    //jenis barang
    Route::get('gudang/jenis-barang', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'index']);
    Route::get('gudang/jenis-barang/tambah', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'create']);
    Route::post('gudang/jenis-barang/tambah', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'store']);
    Route::get('gudang/jenis-barang/edit/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'edit']);
    route::post('gudang/jenis-barang/edit/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'update']);
    route::get('gudang/jenis-barang/delete/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'destroy']);
    
    //barang
    Route::get('gudang/barang', [Controllers\pergudangan\barang\BarangController::class, 'index']);
    Route::get('gudang/barang/tambah', [Controllers\pergudangan\barang\BarangController::class, 'create']);
    Route::post('gudang/barang/tambah', [Controllers\pergudangan\barang\BarangController::class, 'store']);
    Route::get('gudang/barang/edit/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'edit']);
    Route::post('gudang/barang/edit/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'update']);
    Route::get('gudang/barang/delete/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'destroy']);
    
    //barang_in
    Route::get('gudang/barang-in', [Controllers\pergudangan\barang_in\Barang_inController::class, 'index']);
    Route::get('gudang/barang-in/tambah', [Controllers\pergudangan\barang_in\Barang_inController::class, 'create']);
    Route::post('gudang/barang-in/tambah', [Controllers\pergudangan\barang_in\Barang_inController::class, 'store']);
    
    //barang_out
    Route::get('gudang/barang-out', [Controllers\pergudangan\barang_out\Barang_outController::class, 'index']);
    Route::get('gudang/barang-out/tambah', [Controllers\pergudangan\barang_out\Barang_outController::class, 'create']);
    Route::post('gudang/barang-out/tambah', [Controllers\pergudangan\barang_out\Barang_outController::class, 'store']);
});

Route::middleware(['penjualan'])->group(function () {
    //Pemasaran
    //pelanggan
    Route::get('penjualan/pelanggan', [Controllers\pemasaran\pelanggan\PelangganController::class, 'index']);
    route::get('penjualan/pelanggan/tambah', [Controllers\pemasaran\pelanggan\PelangganController::class, 'create']);
    route::post('penjualan/pelanggan/tambah', [Controllers\pemasaran\pelanggan\PelangganController::class, 'store']);
    route::get('penjualan/pelanggan/edit/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'edit']);
    route::post('penjualan/pelanggan/edit/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'update']);
    route::get('penjualan/pelanggan/delete/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'destroy']);
    
    
    //kurir
    Route::get('penjualan/kurir', [Controllers\pemasaran\kurir\KurirController::class, 'index']);
    route::get('penjualan/kurir/tambah', [Controllers\pemasaran\kurir\KurirController::class, 'create']);
    route::post('penjualan/kurir/tambah', [Controllers\pemasaran\kurir\KurirController::class, 'store']);
    route::get('penjualan/kurir/edit/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'edit']);
    route::post('penjualan/kurir/edit/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'update']);
    route::get('penjualan/kurir/delete/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'destroy']);
    
    //barang dikirim
    Route::get('penjualan/barang-dikirim', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'index']);
    route::get('penjualan/barang-dikirim/tambah', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'create']);
    route::post('penjualan/barang-dikirim/tambah', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'store']);
    route::get('penjualan/barang-dikirim/edit/{koderesi}', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'edit']);
    route::post('penjualan/barang-dikirim/edit/{koderesi}', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'update']);
});

Route::middleware(['produksi'])->group(function () {
    //produksi
    //penjadwalan
    Route::get('produksi/penjadwalan', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'index']);
    route::get('produksi/penjadwalan/tambah', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'create']);
    route::post('produksi/penjadwalan/tambah', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'store']);
    route::get('produksi/penjadwalan/edit/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'edit']);
    route::post('produksi/penjadwalan/edit/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'update']);
    route::get('produksi/penjadwalan/delete/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'destroy']);
    
    //pabrik
    Route::get('produksi/pabrik', [Controllers\produksi\pabrik\PabrikController::class, 'index']);
    route::get('produksi/pabrik/tambah', [Controllers\produksi\pabrik\PabrikController::class, 'create']);
    route::post('produksi/pabrik/tambah', [Controllers\produksi\pabrik\PabrikController::class, 'store']);
    route::get('produksi/pabrik/edit/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'edit']);
    route::post('produksi/pabrik/edit/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'update']);
    route::get('produksi/pabrik/delete/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'destroy']);
});

route::middleware(['manajer'])->group(function () {
    //keuangan
    Route::get('manajer/keuangan', [Controllers\manajer\ManajerController::class, 'keuangan']);

    //Produksi
    Route::get('manajer/produksi', [Controllers\manajer\ManajerController::class, 'produksi']);

    //pengguna
    Route::get('manajer/user', [Controllers\manajer\ManajerController::class, 'users']);
    Route::get('manajer/user/delete/{id}', [Controllers\manajer\ManajerController::class, 'destroy']);
    Route::get('manajer/user/tambah', [RegisteredUserController::class, 'create']);
    Route::post('manajer/user/tambah', [RegisteredUserController::class, 'store']);
});
