<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table        = "harga_barangs";
    protected $primaryKey   = "id_barang";
    protected $fillable     = ['id_barang', 'Nama_Barang', 'harga', 'tanggal'];
}
