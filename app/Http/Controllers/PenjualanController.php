<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::with('barang')->get();

        //dd($data);
        $this->data['jual'] = $data;

        return view('penjualan.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = Barang::all();
        // dd($databarang);         
        $this->data['barangs'] = $databarang;

        return view('penjualan.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->barang_id);
        //dd($json);
        for ($i = 0; $i < count($request->barang_id); $i++) {
            $penjualan = new Penjualan();
            $penjualan->barang_id = $request->barang_id[$i];
            $penjualan->jumlah = $request->jumlah[$i];
            $penjualan->harga = $request->harga[$i];
            $penjualan->total_harga = $request->total_harga[$i];
            $savePenjualan = $penjualan->save();
        }
        //dd($barang->nama_barang);

        //dd($saveBarang);
        if ($savePenjualan == true) {
            return redirect()->route('penjualan.index')->with('success', 'Data Barang berhasil ditambah!');
        } else {
            return redirect()->route('penjualan.create')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
