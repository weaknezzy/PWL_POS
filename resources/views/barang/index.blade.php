@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori ID</th>
                    <th>Barang Kode</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
$(document).ready(function() {
    var dataBarang = $('#table_barang').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('barang/list') }}",
            dataType: "json",
            type: "POST"
        },
        columns: [
            {
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "kategori.kategori_id",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                data: "barang_kode",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                data: "barang_nama",
                className: "",
                orderable: false,
                searchable: false
            },
            {
                data: "harga_beli",
                className: "",
                orderable: false,
                searchable: false
            },
            {
                data: "harga_jual",
                className: "",
                orderable: false,
                searchable: false
            },
            {
                data: "aksi",
                className: "",
                orderable: false,
                searchable: false
            }
        ]
    });
});
</script>
@endpush

