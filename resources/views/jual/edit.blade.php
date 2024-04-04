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
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                Data you're looking for not found.
                <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Back</a>
            </div>
        @else
            <form method="POST" action="{{ url('/penjualan/'.$jual->penjualan_id) }}" class="form-horizontal">
                @csrf
                {{ method_field('PUT') }} <!-- Add this line to support edit process which requires PUT method -->

                <div class="form-group row">
                    <label for="user_id" class="col-1 control-label col-form-label">User</label>
                    <div class="col-11">
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">- Pilih user -</option>
                            @foreach($user as $item)
                                <option value="{{ $item->user_id }}" @if($item->user_id == $jual->user_id) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pembeli" class="col-1 control-label col-form-label">Pembeli</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ old('pembeli', $jual->pembeli) }}" required>
                        @error('pembeli')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penjualan_kode" class="col-1 control-label col-form-label">Penjualan Kode</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode" value="{{ old('penjualan_kode', $jual->penjualan_kode) }}" required>
                        @error('penjualan_kode')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

               <div class="form-group row">
                    <label for="penjualan_tanggal" class="col-1 control-label col-form-label">Penjualan Tanggal</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="penjualan_tanggal" name="penjualan_tanggal" value="{{ old('penjualan_tanggal', $jual->penjualan_tanggal) }}" required>
                        @error('penjualan_tanggal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan') }}">Back</a>
                    </div>
                </div>
            </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush


