<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Transaksi;
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

        $data = Transaksi::all();
        // dd($data);
        $this->data['transaksi'] = $data;
        return view('penjualan.index', $this->data);
    }

    public function dashboard()
    {
        // $data = Penjualan::with('barang')->get();
        $data = Transaksi::all();
        // dd($data);
        //dd($data);
        $this->data['transaksi'] = $data;
        return view('penjualan.dashboard-index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = Barang::select('barang.id', 'barang.nama_barang', 'barang.merk', 'barang.tipe', 'barang.harga_jual', DB::raw('NVL(SUM(pembelian.current_stock), 0) As stock'))
            ->leftJoin('pembelian', 'pembelian.barang_id', '=', 'barang.id')
            ->groupBy('barang.id', 'barang.nama_barang', 'barang.merk', 'barang.tipe', 'barang.harga_jual')
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
            ]);

            $transaksi = new Transaksi();
            $transaksi->created_by = auth()->user()->email;
            $transaksi->tanggal = date('Y-m-d');
            $transaksi->kode_transaksi = "TRX-SELL-" . date('Ymd') . "-" . Str::random(5);
            $transaksi->save();

            $jumlah_barang = 0;
            $total_harga = 0;
            for ($i = 0; $i < count($request->barang_id); $i++) {
                $penjualan = new Penjualan();
                $penjualan->transaksi_id = $transaksi->id;
                $penjualan->barang_id = $request->barang_id[$i];
                // $penjualan->kode_penjualan = "SELL-" . date('Ymd') . "-" . $request->barang_id[$i] . "-" . Str::random(5);
                $penjualan->kode_penjualan = $transaksi->kode_transaksi;
                if (empty($request->jumlah[$i])) {
                    return redirect()->route('penjualan.create')->with('validationErrors', 'Jumlah barang tidak boleh kosong!');
                } else {
                    $penjualan->jumlah = $request->jumlah[$i];
                }
                $jumlah_barang += $request->jumlah[$i];

                if (empty($request->harga[$i])) {
                    return redirect()->route('penjualan.create')->with('validationErrors', 'Harga penjualan tidak boleh kosong!');
                } else {
                    $penjualan->harga = $request->harga[$i];
                }

                $penjualan->total_harga = $request->harga[$i] * $request->jumlah[$i];

                $total_harga += $penjualan->total_harga;
                $penjualan->created_by = auth()->user()->email;
                $penjualan->tanggal = date('Y-m-d');

                $this->kurangiStokBarang($request->barang_id[$i], $request->jumlah[$i]);

                if ($this->state) {
                    $penjualan->save();
                    $this->state = true;
                }
            }
            // dd($total_harga);
            // dd($jumlah_barang);


            $transaksi->jumlah = $jumlah_barang;
            $transaksi->total_harga = $total_harga;
            if ($this->state) {
                $transaksi->save();
                $this->state = true;
            }

            return redirect()->route('penjualan.index')->with('success', 'Penjualan Barang berhasil ditambah!');
        } catch (\Exception $e) {
            echo $e->getMessage();
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
    public function show($id)
    {
        $order = 'desc';
        $data = Penjualan::join('barang', 'barang.id', '=', 'penjualan.barang_id')->orderBy('penjualan.tanggal', $order)->select('penjualan.*')->where('penjualan.transaksi_id', $id)->get();

        // dd($data);
        $transaksi = Transaksi::find($id);
        $this->data['jual'] = $data;
        $this->data['transaksi'] = $transaksi;

        return view('penjualan.show', $this->data);
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
