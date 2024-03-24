{{-- <!DOCTYPE html>
<html>
    <head>
        <title> User Tambah </title>
    </head>
    <body>
            <h1> Form Tambah Data User </h1>
            <form method="post" action ="{{ route('/user/tambah_simpan')}}">{{ csrf_field() }}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username">
            <br>

            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama">
            <br>
             
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password"
            <br>

            <label> Level ID </label>
            <input type="number" name="level_id">
            <br>

            <input type="submit" name="btn btn_success" value = "Simpan">
            </form>
    </body>
</html>      --}}
@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'M_User')
@section('content_header_title', 'M_User')
@section('content_header_subtitle', 'Create')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat User baru</h3>
            </div>
            <form method="post" action="{{ route('user.tambah_simpan') }}">
                {{ csrf_field() }}
                <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="userid">User ID</label>

                        <input id="userid" type="text" name="userid" class="@error('userid') is_invalid @enderror form-control"
                            
                        @error('userid')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input id="level_id" type="text" name="level_id"
                            class="@error('level_id') is_invalid @enderror form-control">
                        @error('level_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" name="username"
                            class="@error('username') is_invalid @enderror form-control">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input id="nama" type="text" name="nama"
                            class="@error('nama') is_invalid @enderror form-control">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password"
                            class="@error('password') is_invalid @enderror form-control">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('kategori') }}" class="btn btn-primary">Back</a>
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
