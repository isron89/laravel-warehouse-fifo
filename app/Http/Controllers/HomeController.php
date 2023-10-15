<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Penjualan;

class HomeController extends Controller
{
    //
    public function index()
    {

        $beli_jum = Pembelian::sum('jumlah');
        $jual_jum = Penjualan::sum('jumlah');
        $jual_total = Penjualan::sum('total_harga');

        $this->data['sedia_jual'] = $jual_jum;
        $this->data['sedia_jum'] = $beli_jum - $jual_jum;
        $this->data['sedia_total_jual'] = $jual_total;

        return view('home', $this->data);
    }
}
