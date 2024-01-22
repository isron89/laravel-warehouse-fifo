@extends('layouts.app')

@section('title'){{"Warehouse - Edit Barang - ".($barang->nama_barang)}}@endsection

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body px-5 py-4">
        @include('includes.flash')
        <form action="{{route('barang.update',$barang->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="container">
                <h3 class="fw-bold">Barang Edit : {{$barang->nama_barang}}</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="nama_barang" class="fw-bold">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$barang->nama_barang}}">
                    </div>
                    <div class="col-6">
                        <label for="kode_barang" class="fw-bold">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{$barang->kode_barang}}">
                    </div>
                    <div class="col-6">
                        <label for="merk" class="fw-bold">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" value="{{$barang->merk}}">
                    </div>
                    <div class="col-6">
                        <label for="tipe" class="fw-bold">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" value="{{$barang->tipe}}">
                    </div>
                    <div class="col-6">
                        <label for="supplier" class="fw-bold">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$barang->supplier}}">
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-6">
                        <label for="harga" class="fw-bold">Harga Jual</label>
                        <input type="number" class="form-control" id="harga" name="harga_jual" value="{{$barang->harga_jual}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@include ('includes.scripts')
@endsection