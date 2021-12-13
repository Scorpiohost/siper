<?php

use App\Models\keuangan\Keuangan;
use App\Http\Controllers;
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

//keuangan
Route::get('/keuangan', [Controllers\keuangan\KeuanganController::class, 'index']);
Route::get('/keuangan/tambah', [Controllers\keuangan\KeuanganController::class, 'create']);
route::post('/keuangan/tambah', [Controllers\keuangan\KeuanganController::class, 'store']);
Route::get('/keuangan/edit/{tcode}', [Controllers\keuangan\KeuanganController::class, 'edit']);
Route::post('/keuangan/edit/{tcode}', [Controllers\keuangan\KeuanganController::class, 'update']);
Route::get('/keuangan/delete/{tcode}', [Controllers\keuangan\KeuanganController::class, 'destroy']);

//pergudangan

//jenis barang
Route::get('/jenis-barang', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'index']);
Route::get('/jenis-barang/tambah', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'create']);
Route::post('/jenis-barang/tambah', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'store']);
Route::get('/jenis-barang/edit/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'edit']);
route::post('/jenis-barang/edit/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'update']);
route::get('/jenis-barang/delete/{id}', [Controllers\pergudangan\jenis_barang\Jenis_BarangController::class, 'destroy']);

//barang
Route::get('/barang', [Controllers\pergudangan\barang\BarangController::class, 'index']);
Route::get('/barang/tambah', [Controllers\pergudangan\barang\BarangController::class, 'create']);
Route::post('/barang/tambah', [Controllers\pergudangan\barang\BarangController::class, 'store']);
Route::get('/barang/edit/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'edit']);
Route::post('/barang/edit/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'update']);
Route::get('/barang/delete/{bcode}', [Controllers\pergudangan\barang\BarangController::class, 'destroy']);

//barang_in
Route::get('/barang-in', [Controllers\pergudangan\barang_in\Barang_inController::class, 'index']);
Route::get('/barang-in/tambah', [Controllers\pergudangan\barang_in\Barang_inController::class, 'create']);
Route::post('/barang-in/tambah', [Controllers\pergudangan\barang_in\Barang_inController::class, 'store']);

//barang_out
Route::get('/barang-out', [Controllers\pergudangan\barang_out\Barang_outController::class, 'index']);
Route::get('/barang-out/tambah', [Controllers\pergudangan\barang_out\Barang_outController::class, 'create']);
Route::post('/barang-out/tambah', [Controllers\pergudangan\barang_out\Barang_outController::class, 'store']);

//Pemasaran
//pelanggan
Route::get('/pelanggan', [Controllers\pemasaran\pelanggan\PelangganController::class, 'index']);
route::get('/pelanggan/tambah', [Controllers\pemasaran\pelanggan\PelangganController::class, 'create']);
route::post('/pelanggan/tambah', [Controllers\pemasaran\pelanggan\PelangganController::class, 'store']);
route::get('/pelanggan/edit/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'edit']);
route::post('/pelanggan/edit/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'update']);
route::get('/pelanggan/delete/{id}', [Controllers\pemasaran\pelanggan\PelangganController::class, 'destroy']);


//kurir
Route::get('/kurir', [Controllers\pemasaran\kurir\KurirController::class, 'index']);
route::get('/kurir/tambah', [Controllers\pemasaran\kurir\KurirController::class, 'create']);
route::post('/kurir/tambah', [Controllers\pemasaran\kurir\KurirController::class, 'store']);
route::get('/kurir/edit/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'edit']);
route::post('/kurir/edit/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'update']);
route::get('/kurir/delete/{id}', [Controllers\pemasaran\kurir\KurirController::class, 'destroy']);

//barang dikirim
Route::get('/barang-dikirim', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'index']);
route::get('/barang-dikirim/tambah', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'create']);
route::post('/barang-dikirim/tambah', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'store']);
route::get('/barang-dikirim/edit/{koderesi}', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'edit']);
route::post('/barang-dikirim/edit/{koderesi}', [Controllers\pemasaran\barang_dikirim\Barang_dikirimController::class, 'update']);

//produksi
//produksi
Route::get('/penjadwalan', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'index']);
route::get('/penjadwalan/tambah', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'create']);
route::post('/penjadwalan/tambah', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'store']);
route::get('/penjadwalan/edit/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'edit']);
route::post('/penjadwalan/edit/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'update']);
route::get('/penjadwalan/delete/{kodeproduksi}', [Controllers\produksi\penjadwalan\PenjadwalanController::class, 'destroy']);

//pabrik
Route::get('/pabrik', [Controllers\produksi\pabrik\PabrikController::class, 'index']);
route::get('/pabrik/tambah', [Controllers\produksi\pabrik\PabrikController::class, 'create']);
route::post('/pabrik/tambah', [Controllers\produksi\pabrik\PabrikController::class, 'store']);
route::get('/pabrik/edit/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'edit']);
route::post('/pabrik/edit/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'update']);
route::get('/pabrik/delete/{kodepabrik}', [Controllers\produksi\pabrik\PabrikController::class, 'destroy']);
