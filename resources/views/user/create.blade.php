@extends('layouts.app')

@section('title','Warehouse - Tambah User')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        @include('includes.flash')
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="container">
                <h3 class="fw-bold">User Input</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="name" class="fw-bold">Nama User</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Aldi">
                    </div>
                    <div class="col-6">
                        <label for="kode_barang" class="fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="aldi@gmail.com">
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-6">
                        <label for="harga" class="fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@include ('includes.scripts')
@endsection