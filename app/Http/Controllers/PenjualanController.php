<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $state = true;
    public function index()
    {
        // $data = Penjualan::with('barang')->get();
        $order = 'desc';
        $data = Penjualan::join('barang', 'barang.id', '=', 'penjualan.barang_id')->orderBy('penjualan.tanggal', $order)->select('penjualan.*')->get();

        // dd($data);
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
        $databarang = Barang::select('barang.id', 'barang.nama_barang', 'barang.harga_jual', DB::raw('SUM(pembelian.current_stock) As stock'))
            ->leftJoin('pembelian', 'pembelian.barang_id', '=', 'barang.id')
            ->groupBy('barang.id', 'barang.nama_barang', 'barang.harga_jual')
            ->get();
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

        // dd($request);
        // dd($json);
        try {
            $this->validate($request, [
                'barang_id' => 'required',
                'jumlah' => 'required',
                'harga' => 'required',
                'total_harga' => 'required'
            ]);

            for ($i = 0; $i < count($request->barang_id); $i++) {
                $penjualan = new Penjualan();
                $penjualan->barang_id = $request->barang_id[$i];
                $penjualan->kode_penjualan = "SELL-" . date('Ymd') . "-" . $request->barang_id[$i] . "-" . Str::random(5);
                if (empty($request->jumlah[$i])) {
                    return redirect()->route('penjualan.create')->with('validationErrors', 'Jumlah barang tidak boleh kosong!');
                } else {
                    $penjualan->jumlah = $request->jumlah[$i];
                }

                if (empty($request->harga[$i])) {
                    return redirect()->route('penjualan.create')->with('validationErrors', 'Harga penjualan tidak boleh kosong!');
                } else {
                    $penjualan->harga = $request->harga[$i];
                }

                if (empty($request->total_harga[$i])) {
                    return redirect()->route('penjualan.create')->with('validationErrors', 'Total harga tidak boleh kosong!');
                } else {
                    $penjualan->total_harga = $request->total_harga[$i];
                }

                $penjualan->created_by = auth()->user()->email;
                $penjualan->tanggal = date('Y-m-d');

                $this->kurangiStokBarang($request->barang_id[$i], $request->jumlah[$i]);

                if ($this->state) {
                    $penjualan->save();
                    $this->state = true;
                    return redirect()->route('penjualan.index')->with('success', 'Penjualan Barang berhasil ditambah!');
                }
            }
            return redirect()->route('penjualan.create');
        } catch (\Exception $e) {
            return redirect()->route('penjualan.create')->with('validationErrors', 'Cek kembali penjualan!');
        }
    }

    private function kurangiStokBarang($idBarang, $jumlahBeli)
    {
        $_product = Barang::with(['pembelian' => function ($query) {
            $query->orderBy('tanggal', 'asc');
        }])->find($idBarang);
        $quantity = $jumlahBeli;
        $batches = $_product->pembelian;
        $max = $batches->sum('current_stock');
        if ($quantity > $max) {
            $this->state = false;
            return redirect()->route('penjualan.create')->with('validationErrors', 'Stok Barang Tidak Mencukupi');
        }
        foreach ($batches as $batch) {
            if ($batch->current_stock > $quantity) {
                $batch->current_stock -= $quantity;
                $batch->save();
                break;
            } else {
                $quantity -= $batch->current_stock;
                $batch->current_stock = 0;
                $batch->save();
            }
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
