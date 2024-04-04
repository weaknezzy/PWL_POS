{{-- @extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Add</a>
                </div>
                Manage Kategori
            </div>
            <div class="card-body">

                {{ $dataTable->table() }}
            
            </div>
        </div>
    </div>
   
@endsection

@push('js')
    {{ $dataTable->scripts() }}
@endpush --}}
@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama</th>
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
    var dataKategori = $('#table_kategori').DataTable({
        serverSide: true, 
        ajax: {
            "url": "{{ url('user/list') }}",
            "dataType": "json",
            "type": "POST"
        },
        columns: [
            {
                data: "DT_RowIndex", 
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "kategori_kode",
                className: "",
                orderable: true, 
                searchable: true 
            },
            {
                data: "kategori_nama",
                className: "",
                orderable: true, 
                searchable: true 
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
