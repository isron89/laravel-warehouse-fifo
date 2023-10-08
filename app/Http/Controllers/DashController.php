<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Penjualan;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pembelian
        $beli_jum = Pembelian::sum('jumlah');
        $beli_harga = Pembelian::avg('harga');
        $beli_total = Pembelian::sum('total_harga');
         $this->data['beli_harga'] = $beli_harga;
         $this->data['beli_jum'] = $beli_jum;
         $this->data['beli_total'] = $beli_total;

         //Penjualan
        $jual_jum = Penjualan::sum('jumlah');
        $jual_harga = Penjualan::avg('harga');
        $jual_total = Penjualan::sum('total_harga');
         $this->data['jual_harga'] = $jual_harga;
         $this->data['jual_jum'] = $jual_jum;
         $this->data['jual_total'] = $jual_total;
         
         //Persediaan
         $sedia_jum = $beli_jum - $jual_jum;
         $sedia_harga = ($beli_harga + $jual_harga)/2 ;
         $sedia_total = $beli_total - $jual_total;
         $this->data['sedia_harga'] = $sedia_harga;
         $this->data['sedia_jum'] = $sedia_jum;
         $this->data['sedia_total'] = $sedia_total;
        
        
        //dd($beli_harga);
        return view('dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
