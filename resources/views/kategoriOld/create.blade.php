@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>
            <form method="post" action="../kategori">
                <div class="card-body">
                    <label for="kategori_kode">Kode Kategori</label>

                    <input id="kategori_kode" type="text" name="kategori_kode"
                        class="@error('kategori_kode') is_invalid @enderror form-control">

                    @error('kategori_kode')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-grup">
                        <label for = "namaKategori">Nama Kategori</label>
                        <input type="text" class="@error('namaKategori') is_invalid @enderror form-control" id="namaKategori" name="namaKategori" </div>
                    @error('kategori_kode')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kategori') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif --}}

@endsection
