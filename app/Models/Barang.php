<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primarykey = "id";
    protected $fillable = ['nama_barang', 'kode_barang', 'merk', 'tipe', 'supplier', 'harga_jual'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
