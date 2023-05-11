<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;

class PrediksiController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'hari' => 'required|integer', // Ubah 'Hari' menjadi 'hari' dan tambahkan validasi integer
        ]);

        $num_days = $request->hari;

        $data = BarangModel::select('tanggal', 'harga')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ambil tanggal terakhir dari data sebagai tanggal awal prediksi
        $start_date = $data->last()->tanggal;

        $n = count($data); // Jumlah data
        $sum_x = 0; // Jumlah tanggal
        $sum_x2 = 0; // Jumlah kuadrat tanggal
        $sum_x3 = 0; // Jumlah pangkat 3 tanggal
        $sum_x4 = 0; // Jumlah pangkat 4 tanggal
        $sum_y = 0; // Jumlah harga
        $sum_xy = 0; // Jumlah perkalian tanggal dan harga
        $sum_x2y = 0; // Jumlah perkalian kuadrat tanggal dan harga

        // Hitung nilai sum_x, sum_x2, sum_x3, sum_x4, sum_y, sum_xy, dan sum_x2y
        foreach ($data as $row) {
            $timestamp = strtotime($row->tanggal);
            $x = (int) date('d', $timestamp); // ambil tanggal dari timestamp dan ubah ke tipe int
            $sum_x += $x;
            $sum_x2 += pow($x, 2);
            $sum_x3 += pow($x, 3);
            $sum_x4 += pow($x, 4);
            $sum_y += $row->harga;
            $sum_xy += $x * $row->harga;
            $sum_x2y += pow($x, 2) * $row->harga;
        }

        $a = (($sum_x2 * $sum_y) - ($sum_x * $sum_xy)) / (($n * $sum_x2) - pow($sum_x, 2));
        $b = (($n * $sum_xy) - ($sum_x * $sum_y)) / (($n * $sum_x2) - pow($sum_x, 2));
        $c = (($sum_x2 * $sum_x2y) - ($sum_x3 * $sum_xy) - ($sum_x * $sum_x4) + ($sum_x2 * $sum_x2)) / (($n * $sum_x4) - pow($sum_x2, 2));

        $predictions = [];

        // Hitung prediksi untuk setiap hari dan simpan dalam $predictions
        for ($i = 0; $i < $num_days; $i++) {
            $date = date('Y-m-d', strtotime($start_date . " +$i day"));
            $prediction = $a * pow($i + $n, 2) + $b * ($i + $n) + $c; // Hitung prediksi menggunakan nilai a, b, c dan tanggal yang dihitung
            $predictions[] = [$date, $prediction];
        }

        // Kirim data prediksi ke view predictions
        return view('Count.Prediksi', ['predictions' => $predictions]);
    }
}
