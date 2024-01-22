@extends('layouts.app')

@section('title','Warehouse - Penjualan')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<a href="{{route('penjualan.create')}}" class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</a>
<div class="card shadow mt-2">
    <div class="card-header" style="display: flex; justify-content: center;">
        <h4 class="card-title">Daftar Transaksi Penjualan</h4>
    </div>
    <div class="card-body">
        @include('includes.flash')
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">No.</th>
                    <th>Tanggal Waktu Transaksi</th>
                    <th>Kode Transaksi</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th width="10px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($transaksi))
                @foreach ($transaksi as $key => $tranksaksis )
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$tranksaksis->tanggal}}</td>
                    <td>{{$tranksaksis->kode_transaksi}}</td>
                    <td>{{$tranksaksis->jumlah}}</td>
                    <td>{{"Rp. ".number_format($tranksaksis->total_harga,0,".",".")}}</td>
                    <td><a href="{{route('penjualan.show', $tranksaksis->id)}}" class="btn btn-info btn-sm"><i class='bx bx-show'></i></a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true,
            lengthChange: false,
            buttons: [{
                extend: 'excel',
                split: ['pdf'],
            }]
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
@include ('includes.scripts')
@endsection