@extends('layouts.app')

@section('title','Barang')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<a href="{{route('barang.create')}}" class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</a>
<div class="card shadow mt-2">
    <div class="card-header" style="display: flex; justify-content: center;">
        <h4 class="card-title">Manajemen Barang</h4>
    </div>
    <div class="card-body">
        @include('includes.flash')
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">No.</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($barang))
                @foreach ($barang as $key => $barangs)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$barangs->nama_barang}}</td>
                    <td>{{$barangs->kode_barang}}</td>
                    <td>{{"Rp. ".number_format($barangs->harga_jual,0,".",".")}}</td>
                    <td>
                        <div class="row gx-6 gy-3">
                            <div class="col">
                                <a href="{{route('barang.edit', $barangs->id)}}">
                                    <button class="btn btn-warning text-light" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{route('barang.show', $barangs->id)}}">
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <form id="delete-barang-{{$barangs->id}}" action="/barang/{{$barangs->id}}" method="POST" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deleteConfirmation()">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- <div>
        //$barang->links()
    </div> -->
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });

    function deleteConfirmation() {
        return confirm("Apakah anda yakin menghapus data ini ?");
    }
</script>
@endpush
@include ('includes.scripts')
@endsection