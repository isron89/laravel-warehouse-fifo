@extends('layouts.app')

@section('title','Warehouse - User')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<a href="{{route('user.create')}}" class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</a>
<div class="card shadow mt-2">
    <div class="card-header" style="display: flex; justify-content: center;">
        <h4 class="card-title">Manajemen User</h4>
    </div>
    <div class="card-body">
        @include('includes.flash')
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">No.</th>
                    <th>Nama User</th>
                    <th>Kode Email</th>
                    <th>Created Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($user))
                @foreach ($user as $key => $users)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->created_at}}</td>
                    <td>
                        <div class="row gx-6 gy-3">
                            <div class="col">
                                <a href="{{route('user.edit', $users->id)}}">
                                    <button class="btn btn-warning text-light" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{route('user.show', $users->id)}}">
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </a>
                            </div>
                            @if ($users->role == 'user')
                            <div class="col">
                                <form id="delete-user-{{$users->id}}" action="/user/{{$users->id}}" method="POST" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deleteConfirmation()">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
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