@extends('layouts.app')

@section('title','Warehouse - Tambah Penjualan')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<div class="card shadow">
  <div class="card-body">
    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <label for="inputPassword6" class="col-form-label">Counter</label>
      </div>
      <div class="col-auto">
        <h4 id="incrementText">1</h4>
      </div>
    </div>
    <table id="myTable">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Harga Jual</th>
          <th>Jumlah</th>
          <th>Total Harga</th>
          <th><button onclick="incrementButton()">Tambah</button></th>
        </tr>
      </thead>
      <tbody id="table-space">
        <tr>
          <td>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </td>
          <td>
            <input type="number" id="harga1" name="harga[]" class="form-control" placeholder="1" class="harga">
          </td>
          <td>
            <input type="number" id="jumlah1" name="jumlah[]" class="form-control" placeholder="1" class="jumlah">
          </td>
          <td>
            <input type="number" id="total_harga1" name="total_harga[]" class="form-control" placeholder="1">
          </td>
          <td>
            <button onclick="remove_tr(this)">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@push('scripts')
<script>
  function incrementButton() {
    var element = document.getElementById('incrementText');
    var value = element.innerHTML;

    ++value;

    var table = document.getElementById("table-space");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<select class="form-select" aria-label="Default select example"><option selected>Open this select menu</option><option value="1">One</option><option value="2">Two</option><option value="3">Three</option></select>';
    cell2.innerHTML = '<input type="number" id="harga' + value + '" name="harga[]" class="form-control" placeholder="1">';
    cell3.innerHTML = '<input type="number" id="jumlah' + value + '" name="jumlah[]" class="form-control" placeholder="1">';
    cell4.innerHTML = '<input type="number" id="total_harga' + value + '" name="total_harga[]" class="form-control" placeholder="1">';
    cell5.innerHTML = '<button onclick="remove_tr(this)">Hapus</button>';

    console.log(value);
    document.getElementById('incrementText').innerHTML = value;

    for (var i = 0; i < value; i++) {
      var jum[i] = $("#jumlah" + i).val();
      var hrg[i] = $("#harga" + i).val();
      var total[i] = parseInt(jum[i]) * parseInt(hrg[i]);

      $("total_harga" + i).val(total[i]);
      console.log('Pencet' + i)
    }
  }

  function remove_tr(This) {
    console.log('kepencet');
    This.closest('tr').remove();
  }

  $(document).ready(function() {
    $('#myTable').DataTable({
      paging: false,
      ordering: false,
      info: false,
      "searching": false,
      responsive: true,
    });
    $("#jumlah1 , #harga1").keyup(function() {
      var jum = $("#jumlah1").val();
      var hrg = $("#harga1").val();
      var total = parseInt(jum) * parseInt(hrg);

      $("#total_harga1").val(total);

    });
  });
</script>
@endpush
@include ('includes.scripts')
@endsection