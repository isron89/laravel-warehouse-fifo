<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = ['tanggal', 'barang_id', 'jumlah', 'harga', 'total_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
