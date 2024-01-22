<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        // dd($data);
        //dd($data);
        $this->data['barang'] = $data;
        return view('barang.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'supplier' => 'required',
            'harga_jual' => 'required'
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->merk = $request->merk;
        $barang->tipe = $request->tipe;
        $barang->supplier = $request->supplier;
        $barang->harga_jual = $request->harga_jual;
        $barang->created_by = Auth::user()->email;
        //dd($barang->nama_barang);
        $saveBarang = $barang->save();

        //dd($saveBarang);
        if ($saveBarang == true) {
            return redirect()->route('barang.index')->with('success', 'Data Barang berhasil ditambah!');
        } else {
            return redirect()->route('barang.edit')->with('validationErrors', 'Gagal menambahkan data barang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::find($id);
        //dd($data);
        $this->data['barang'] = $data;
        return view('barang.detail', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = Barang::find($id);
        //dd($data);
        $this->data['barang'] = $data;

        //dd($this->data);
        return view('barang.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'supplier' => 'required',
            'harga_jual' => 'required'
        ]);

        //dd($barang->id);
        $barang = Barang::find($barang->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->merk = $request->merk;
        $barang->tipe = $request->tipe;
        $barang->supplier = $request->supplier;
        $barang->harga_jual = $request->harga_jual;

        $updatebarang = $barang->save();
        //dd($updatebarang);
        if ($updatebarang == true) {
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil diubah!');
        } else {
            return redirect()->route('barang.edit')->with('validationErrors', 'Gagal mengubah data barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $deleteData = $barang->delete();
        //dd($deleteData);

        $pembelian = Pembelian::where('barang_id', $id)->get();
        if ($pembelian != null) {
            foreach ($pembelian as $pembelian) {
                $pembelian->delete();
            }
        }

        $penjualan = Penjualan::where('barang_id', $id)->get();
        if ($penjualan != null) {
            foreach ($penjualan as $penjualan) {
                $penjualan->delete();
            }
        }

        if ($deleteData == true) {
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
        } else {
            return redirect()->route('barang.index')->with('ValidationErrors', 'Gagal menghapus data barang');
        }
    }
}
