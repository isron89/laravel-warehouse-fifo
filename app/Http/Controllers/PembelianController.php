<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Pembelian::with('barang')->get();
        $order = 'desc';
        $data = Pembelian::join('barang', 'barang.id', '=', 'pembelian.barang_id')->orderBy('pembelian.tanggal', $order)->select('pembelian.*')->get();

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
        try {
            $this->validate($request, [
                'barang_id' => 'required',
                'jumlah' => 'required',
                'harga' => 'required',
                'total_harga' => 'required'
            ]);

            $pembelian = new Pembelian();
            $pembelian->tanggal = $request->tanggal;
            $pembelian->barang_id = $request->barang_id;
            $pembelian->kode_pembelian = "BUY-" . date('Ymd') . "-" . $request->barang_id . "-" . Str::random(5);
            $pembelian->jumlah = $request->jumlah;
            $pembelian->current_stock = $request->jumlah;
            $pembelian->harga = $request->harga;
            $pembelian->total_harga = $request->total_harga;
            $pembelian->created_by = auth()->user()->email;
            $pembelian->save();
            return redirect()->route('pembelian.index')->with('success', 'Data Barang berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect()->route('pembelian.create')->with('validationErrors', 'Cek kembali pembelian anda!');
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
