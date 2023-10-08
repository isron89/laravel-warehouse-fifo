@extends('layouts.app')

@section('title','Pembelian')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<a href="{{route('pembelian.create')}}" class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</a>
<div class="card shadow mt-2">
    <div class="card-body">
        @include('includes.flash')
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">No.</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @if (count($beli))
                    @foreach ($beli as $key => $belis)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$belis->tanggal}}</td>
                        <td>{{$belis->barang->nama_barang}}</td>
                        <td>{{$belis->jumlah}}</td>
                        <td>{{"Rp. ".number_format($belis->harga,0,".",".")}}</td>
                        <td>{{"Rp. ".number_format($belis->total_harga,0,".",".")}}</td>
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
    var table = $('#example').DataTable( {
        responsive:true,
        lengthChange: false,
        buttons: [
            {
                extend: 'excel',
                split: [ 'pdf'],
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
@endpush
@include ('includes.scripts')
@endsection