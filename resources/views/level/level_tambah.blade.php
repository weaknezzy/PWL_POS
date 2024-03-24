@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'M_Level')
@section('content_header_title', 'M_Level')
@section('content_header_subtitle', 'Create')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat level baru</h3>
            </div>
            <form method="post" action="{{ route('level.level_simpan') }}">
                {{ csrf_field() }}
                <div class="card-body">

                    {{-- <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input id="level_id" type="text" name="level_id"
                            class="@error('level_id') is_invalid @enderror form-control">
                        @error('level_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="level_kode">Level Kode</label>
                        <input id="level_kode" type="text" name="level_kode"
                            class="@error('level_kode') is_invalid @enderror form-control">
                        @error('level_kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="level_nama">Level Name</label>
                        <input id="level_nama" type="text" name="level_nama"
                            class="@error('nama') is_invalid @enderror form-control">
                        @error('level_nama')
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