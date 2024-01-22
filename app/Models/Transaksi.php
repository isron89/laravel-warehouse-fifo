<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primarykey = "id";
    protected $fillable = ['tanggal', 'kode_transaksi', 'jumlah', 'total_harga'];
}
