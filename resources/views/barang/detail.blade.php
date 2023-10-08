@extends('layouts.app')

@section('title'){{"Barang - ".($barang->nama_barang)}}@endsection

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body px-5 py-4">
        <div class="row">
            <h4 class="fw-bold">Detail Barang {{$barang->nama_barang}}</h4>
        </div>
        <div class="row">
            <!-- <div class="visible-print">
                <img src="{{ asset('assets') }}/img/image-'.$barang->kode_barang.'.jpeg" alt="">
                <a href="" class="btn btn-primary ms-3" download>
                    Download QR
                </a>
            </div> -->
            <div class="row mt-3">
                <table>
                    <tr>
                        <td width="200px">Nama Barang</td>
                        <td width="20px">:</td>
                        <td>{{$barang->nama_barang}}</td>
                    </tr>
                    <tr>
                        <td>Kode Barang</td>
                        <td>:</td>
                        <td>{{$barang->kode_barang}}</td>
                    </tr>
                    <tr>
                        <td>Harga Jual</td>
                        <td>:</td>
                        <td>{{"Rp. ".number_format($barang->harga_jual,0,".",".")}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@include ('includes.scripts')
@endsection