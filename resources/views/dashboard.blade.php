@extends('layouts.app')

@section('title','Tes')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        <div class="row mb-3">
            <h3 class="fw-bold">Pembelian</h3>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Jumlah</h4>
                            <h5>{{$beli_jum}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Harga</h4>
                            <h5>{{"Rp. ".number_format($beli_harga,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Total</h4>
                            <h5>{{"Rp. ".number_format($beli_total,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <h3 class="fw-bold">Penjualan</h3>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Jumlah</h4>
                            <h5>{{$jual_jum}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Harga</h4>
                            <h5>{{"Rp. ".number_format($jual_harga,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Total</h4>
                            <h5>{{"Rp. ".number_format($jual_total,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h3 class="fw-bold">Persediaan</h3>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Jumlah</h4>
                            <h5>{{$sedia_jum}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Harga</h4>
                            <h5>{{"Rp. ".number_format($sedia_harga,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Total</h4>
                            <h5>{{"Rp. ".number_format($sedia_total,0,".",".")}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include ('includes.scripts')
@endsection