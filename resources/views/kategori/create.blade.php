@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle','Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
        <h3 class="card-title">Buat kategori baru</h3>
        </div>

        <form method="post" action="../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori"
                </div>
                <div class="form-grup">
                    <label for = "namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                </div>
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('kategori') }}" class="btn btn-primary">Back</a>
            </div>
            
        </form>
        </div>
    </div>
@endsection