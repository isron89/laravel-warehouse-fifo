@extends('layouts.app')

@section('title'){{"Warehouse - User - ".($user->name)}}@endsection

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body px-5 py-4">
        <div class="row">
            <h4 class="fw-bold">Detail User {{$user->name}}</h4>
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
                        <td width="200px">Nama User</td>
                        <td width="20px">:</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td>{{$user->role}}</td>
                    </tr>
                    <tr>
                        <td>Created date</td>
                        <td>:</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@include ('includes.scripts')
@endsection