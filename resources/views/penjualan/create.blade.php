@extends('layouts.app')

@section('title','Warehouse - Tambah Penjualan')

@section('cssTambah')
@include('includes.css')
@endsection
@push('scriptsAtas')
<script type="text/javascript">
    $(document).ready(function() {

        // ++count;
        // var html = '<tr><td class="py-2 px-3"><select class="form-select" aria-label="Default select example" id="nama_barang' + count + '" name="barang_id[]"><option value="" selected>--Choose an option--</option>@foreach ($barangs as $key => $bar )<option value="{{$bar->id}}" data-harga-jual="{{$bar->harga_jual}}" data-stok="{{$bar->stock}}">{{$bar->nama_barang}}</option>@endforeach</select></td><td class="py-2 px-3"><input type="number" id="jumlah" name="jumlah[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="number" id="harga" name="harga[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input disabled type="number" id="stok" name="stok[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="number" id="total_harga" name="total_harga[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="button" class="btn btn-danger" id="remove" value="- Hapus"></td></tr>';

        // var x = 1;
        // $("#add").on('click', function() {
        //     $("#table_space").append(html);
        // });
        $("#table_space").on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });

    });
    var count = 1;

    // $("#nama_barang' + count + '").change(function(e) {
    //     // var val = document.getElementById('hargajual');
    //     // var res = $('#hargajual').text();
    //     var hargajual = $(this).children("option:selected").attr("data-harga-jual");
    //     console.log("ISI HARGA JUAL : " + hargajual);
    //     var sisastok = $(e.target).children("option:selected").attr("data-stok");
    //     console.log("ISI HARGA JUAL : " + sisastok);
    //     // console.log($(e.target).children("option:selected").attr("data-harga-jual"));
    //     $("#harga").val(hargajual);
    //     $("#stok").val(sisastok);
    // });

    function insertRow() {
        ++count;
        console.log("Insert row product " + count);
        var html = '<tr><td class="py-2 px-3"><select class="form-select hitung" aria-label="Default select example" id="nama_barang" name="barang_id[]"><option value="" selected>--Choose an option--</option>@foreach ($barangs as $key => $bar )<option value="{{$bar->id}}" data-harga-jual="{{$bar->harga_jual}}" data-stok="{{$bar->stock}}">{{$bar->nama_barang}}</option>@endforeach</select></td><td class="py-2 px-3"><input type="number" id="jumlah" name="jumlah[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="number" id="harga" name="harga[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="button" class="btn btn-danger" id="remove" value="- Hapus"></td></tr>';

        // $("#add").on('click', function() {
        $("#table_space").append(html);

        // });
        // $("#table_space").on('click', '#remove', function() {

        // });
    }

    function removeRow() {
        --count;
        console.log("Remove row product " + count);
        $("#table_space").closest('tr').remove();
    }

    function hitung() {
        var jum = $("#jumlah").val();
        var hrg = $("#harga").val();
        var total = parseInt(jum) * parseInt(hrg);

        $("#total_harga").val(total);
        document.getElementById("total_harga' + count + '").value = total;

    };

    // function tes2() {
    //     var hargajual = $('#nama_barang' + count + '').children("option:selected").attr("data-harga-jual");
    //     console.log("ISI HARGA JUAL : " + hargajual);
    //     var sisastok = $('#nama_barang' + count + '').children("option:selected").attr("data-stok");
    //     console.log("ISI HARGA JUAL : " + sisastok);
    //     // console.log($(e.target).children("option:selected").attr("data-harga-jual"));
    //     $('#harga' + count + '').val(hargajual);
    //     $('#stok' + count + '').val(sisastok);
    // }
</script>
@endpush

@section('content')
<div class="card shadow mt-2">
    <div class="card-header" style="display: flex; justify-content: center;">
        <h5 class="card-title">Data Barang</h5>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th width="25%">Nama Barang</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Harga Barang</th>
                    <th>Stok</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($barangs))
                @foreach ($barangs as $key => $bar)
                <tr>
                    <td></td>
                    <td>{{$bar->nama_barang}}</td>
                    <td>{{$bar->merk}}</td>
                    <td>{{$bar->tipe}}</td>
                    <td>{{"Rp. ".number_format($bar->harga_jual,0,".",".")}}</td>
                    <td>{{$bar->stock}}</td>
                    <td></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="row items-center">
            <div class="col"></div>
            <div class="col-sm">
                {{-- <div id="reader" width="100px" height="100px"></div> --}}
            </div>
            <div class="col"></div>
            {{-- <input type="number" id="result"> --}}
        </div>
    </div>
</div>
<br>
<div class="card shadow mt-2">
    <div class="card-header" style="display: flex; justify-content: center;">
        <h5 class="card-title">Transaksi Penjualan</h5>
    </div>
    <div class="card-body">
        <!-- <div class="row">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th width="100px">Nama Barang</th>
                        <th width="100px">Merk</th>
                        <th width="100px">Harga Barang</th>
                        <th width="100px">Stok</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($barangs))
                    @foreach ($barangs as $key => $bar)
                    <tr>
                        <td></td>
                        <td>{{$bar->nama_barang}}</td>
                        <td>{{$bar->merk}}</td>
                        <td>{{"Rp. ".number_format($bar->harga_jual,0,".",".")}}</td>
                        <td>{{$bar->stock}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div> -->
        <div class="row items-center">
            <div class="col"></div>
            <div class="col-sm">
                {{-- <div id="reader" width="100px" height="100px"></div> --}}
            </div>
            <div class="col"></div>
            {{-- <input type="number" id="result"> --}}
        </div>
        @include('includes.flash')
        <form action="{{route('penjualan.store')}}" method="POST">
            @csrf
            <table id="table_field" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="px-4 text-center">Nama Barang</th>
                        <th class="px-4 text-center">Jumlah</th>
                        <th class="px-4 text-center">Harga Jual</th>
                        <!-- <th class="px-4 text-center">Sisa Stok</th> -->
                        <!-- <th class="px-4 text-center">Total Harga</th> -->
                        <th><input type="button" class="btn btn-primary" id="add" value="+ Tambah" onclick="insertRow()"></th>
                    </tr>
                </thead>
                <tbody id="table_space">
                    <tr>
                        <td class="py-2 px-3">
                            <select class="form-select" aria-label="Default select example" id="nama_barang" name="barang_id[]">
                                <option value="" selected>--Choose an option--</option>
                                @foreach ($barangs as $key => $bar )
                                <option value="{{$bar->id}}" data-harga-jual="{{$bar->harga_jual}}" data-stok="{{$bar->stock}}">{{$bar->nama_barang}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="py-2 px-3"><input type="number" id="jumlah" name="jumlah[]" class="form-control" placeholder="0"></td>
                        <td class="py-2 px-3"><input type="number" id="harga" name="harga[]" class="form-control" placeholder="0"></td>
                        <!-- <td class="py-2 px-3"><input disabled type="number" id="stok" name="stok[]" class="form-control" placeholder="0"></td> -->
                        <!-- <td class="py-2 px-3"><input type="number" id="total_harga" name="total_harga[]" class="form-control" placeholder="0"></td> -->
                        <td class="py-2 px-3"><input type="button" class="btn btn-danger" id="remove" value="- Hapus" onclick="removeRow()"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3">Checkout</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // $("#jumlah , #harga").keyup(function() {
        //     var jum = $("#jumlah").val();
        //     var hrg = $("#harga").val();
        //     var total = parseInt(jum) * parseInt(hrg);

        //     $("#total_harga").val(total);

        // });

        // function hargaChanged(event) {
        //     var selectElement = event.target;
        //     var value = selectElement.value;
        //     $("#harga").val(value);
        // }
    });

    // $("#nama_barang").change(function(e) {
    //     // var val = document.getElementById('hargajual');
    //     // var res = $('#hargajual').text();
    //     var hargajual = $(this).children("option:selected").attr("data-harga-jual");
    //     console.log("ISI HARGA JUAL : " + hargajual);
    //     var sisastok = $(e.target).children("option:selected").attr("data-stok");
    //     console.log("ISI HARGA JUAL : " + sisastok);
    //     // console.log($(e.target).children("option:selected").attr("data-harga-jual"));
    //     $("#harga").val(hargajual);
    //     $("#stok").val(sisastok);
    // });
</script>
<!-- QR Code Scanner -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);
        // alert(decodedText);
        $('#result').val(decodedText);
        let id = decodedText;
        var html = '<tr><td class="py-2 px-3"><select class="form-select" aria-label="Default select example" id="nama_barang" name="barang_id[]"><option value="" selected>--Choose an option--</option>@foreach ($barangs as $key => $bar )<option value="{{$bar->id}}" data-harga-jual="{{$bar->harga_jual}}" data-stok="{{$bar->stock}}">{{$bar->nama_barang}}</option>@endforeach</select></td><td class="py-2 px-3"><input type="number" id="jumlah" name="jumlah[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="number" id="harga" name="harga[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input disabled type="number" id="stok" name="stok[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="number" id="total_harga" name="total_harga[]" class="form-control" placeholder="0"></td><td class="py-2 px-3"><input type="button" class="btn btn-danger" id="remove" value="- Hapus"></td></tr>';

        $("#table_space").append(html);

    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endpush
@include ('includes.scripts')
@endsection