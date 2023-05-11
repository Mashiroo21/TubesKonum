<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    //method untuk tampil data barang
    public function barangtampil()
    {
        $harga_barang = BarangModel::orderby('id_barang', 'ASC')
            ->paginate(5);

        return view('List.Listpage', ['barang' => $harga_barang]);
    }

    //method untuk tambah data barang
    public function barangtambah(Request $request)
    {
        $request->validate([
            'Nama_Barang' => 'required',
            'Tanggal' => 'required',
            'Harga' => 'required',
        ]);

        $harga_barang = new BarangModel;
        $harga_barang->Nama_Barang = $request->Nama_Barang;
        $harga_barang->tanggal = $request->Tanggal;
        $harga_barang->harga = $request->Harga;
        $harga_barang->save();
        // dd($request->Nama_Barang);
        // dd($request->Tanggal);
        // dd($request->Harga);


        // BarangModel::create([
        //     'Nama_Barang' => $request->Nama_Barang,
        //     'Tanggal' => $request->tanggal,
        //     'Harga' => $request->harga,
        // ]);

        return redirect('/barang');
    }

    //method untuk hapus data barang
    public function baranghapus($id_barang)
    {
        $harga_barang = BarangModel::find($id_barang);
        $harga_barang->delete();

        return redirect()->back();
    }

    //method untuk edit data barang
    public function barangedit($id_barang, Request $request)
    {
        $this->validate($request, [
            'Nama_Barang' => 'required',
            'Tanggal' => 'required',
            'Harga' => 'required',
        ]);

        $id_barang = BarangModel::find($id_barang);
        $id_barang->Nama_Barang   = $request->Nama_Barang;
        $id_barang->tanggal      = $request->Tanggal;
        $id_barang->harga  = $request->Harga;

        $id_barang->save();

        return redirect()->back();
    }
}
