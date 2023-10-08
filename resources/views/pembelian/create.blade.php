@extends('layouts.app')

@section('title','Pembelian - Tambah')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        @include('includes.flash')
        <form action="{{route('pembelian.store')}}" method="POST">
            @csrf
            <div class="container">
                <h3 class="fw-bold">Pembelian Input</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="tanggal" class="fw-bold">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="tanggal">
                    </div>
                    <div class="col-6">
                        <label for="nama_barang" class="fw-bold">Nama Barang</label>
                        <select class="form-select" aria-label="Default select example" id="nama_barang" name="barang_id">
                            @foreach ($barangs as $key => $bar )
                                <option value="{{$bar->id}}">{{$bar->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="tanggal" class="fw-bold">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="col-6">
                        <label for="nama_barang" class="fw-bold">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-12">
                        <label for="nama_barang" class="fw-bold">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Tambahkan</button>
            </div>
          </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#example').DataTable();
        $("#jumlah , #harga").keyup(function(){
              var jum = $("#jumlah").val();
              var hrg = $("#harga").val();
              var total = parseInt(jum) * parseInt(hrg);

              $("#total_harga").val(total);

            });
    });
</script>
<script>
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth()+1;
    var todaydate = String(date.getDate()).padStart(2,'0');
    var dataPatern = year + '/' + month + '/' + todaydate;
    document.getElementById("date").value = dataPatern;
</script>
@endpush
@include ('includes.scripts')
@endsection