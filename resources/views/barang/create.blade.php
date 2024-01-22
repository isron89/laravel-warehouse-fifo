@extends('layouts.app')

@section('title','Warehouse - Tambah Barang')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        @include('includes.flash')
        <form action="{{route('barang.store')}}" method="POST">
            @csrf
            <div class="container">
                <h3 class="fw-bold">Barang Input</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="nama_barang" class="fw-bold">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Keramik">
                    </div>
                    <div class="col-6">
                        <label for="kode_barang" class="fw-bold">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="20230808">
                    </div>
                    <div class="col-6">
                        <label for="merk" class="fw-bold">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Keramik Sederhana">
                    </div>
                    <div class="col-6">
                        <label for="tipe" class="fw-bold">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Keramik Sederhana Tipe 1">
                    </div>
                    <div class="col-6">
                        <label for="supplier" class="fw-bold">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier Sederhana">
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-6">
                        <label for="harga" class="fw-bold">Harga Jual</label>
                        <input type="number" class="form-control" id="harga" name="harga_jual" placeholder="Rp. 25.000">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@include ('includes.scripts')
@endsection