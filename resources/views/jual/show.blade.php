@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>

    <div class="card-body">
        @empty($jual)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $jual->penjualan_id }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ $jual->user->nama }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $jual->pembeli }}</td>
                </tr>
                <tr>
                    <th>Penjualan Kode</th>
                    <td>{{ $jual->penjualan_kode }}</td>
                </tr>
                <tr>
                    <th>Penjualan tanggal</th>
                    <td>{{ $jual->penjualan_tanggal }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
