<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PrediksiController;

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
    return view('Home.Homepage');
})->name('Home');
Route::get('/List', function () {
    return view('List.Listpage');
})->name('Listpage');
Route::get('/Prediksi', function () {
    return view('Count.Prediksi');
})->name('Prediksi');


Route::get('/barang', [BarangController::class, 'barangtampil'])->name('Barang');
Route::post('/barang/tambah', [BarangController::class, 'barangtambah']);
Route::get('/barang/hapus/{id_barang}', [BarangController::class, 'baranghapus']);
Route::put('/barang/edit/{id_barang}', [BarangController::class, 'barangedit']);


Route::get('/prediksi/hari', [PrediksiController::class, 'index'])->name('prediksi');
