<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = ['tanggal', 'barang_id', 'jumlah', 'current_stock', 'harga', 'total_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
