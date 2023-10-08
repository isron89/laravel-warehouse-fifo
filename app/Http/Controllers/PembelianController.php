<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembelian::with('barang')->get();

        //dd($data);
        $this->data['beli'] = $data;
        return view('pembelian.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = Barang::all();
        $this->data['barangs'] = $databarang;
        return view('pembelian.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->jumlah);
        //Masukan Data ke Database
        $pembelian = new Pembelian();
        $pembelian->tanggal = $request->tanggal;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->harga = $request->harga;
        $pembelian->total_harga = $request->total_harga;
        //dd($hewan->nama_hewan);
        $savePembelian = $pembelian->save();

        //dd($saveHewan);
        if ($savePembelian == true) {
            return redirect()->route('pembelian.index')->with('success', 'Data Barang berhasil ditambah!');
        } else {
            return redirect()->route('pembelian.edit')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
