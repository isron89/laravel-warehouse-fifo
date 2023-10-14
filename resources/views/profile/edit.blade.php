@extends('layouts.app')

@section('title'){{"Profile - Update - ".($user->nama_user)}}@endsection

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body px-5 py-4">
        @include('includes.flash')
        <form action="{{route('profile.update',$user->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="container">
                <h3 class="fw-bold">Profile Update : {{$user->nama_user}}</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="nama_user" class="fw-bold">Nama User</label>
                        <input type="text" class="form-control" id="nama_user" name="name" value="{{$user->name}}">
                    </div>
                    <div class="col-6">
                        <label for="email_user" class="fw-bold">Email User</label>
                        <input type="text" class="form-control" id="email_user" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-6">
                        <label for="password" class="fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@include ('includes.scripts')
@endsection