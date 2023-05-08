<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
Route::get('/barang/tambah', 'BarangController@barangtambah');
Route::get('/barang/hapus/{id_barang}', 'BarangController@baranghapus');
Route::get('/barang/edit/{id_barang}', 'BarangController@barangedit');
