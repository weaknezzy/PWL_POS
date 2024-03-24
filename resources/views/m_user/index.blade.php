{{-- @extends('m_user.template')
@section('content')

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                
                <div class="float-left">
                    <h2>CRUD User</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">User id</th>
                <th width="150px" class="text-center">Level id</th>
                <th width="200px" class="text-center">username</th>
                <th width="200px" class="text-center">nama</th>
                <th width="150px" class="text-center">password</th>
            </tr>
            @foreach ($useri as $m_users)
                <tr>
                    <td>{{ $m_users->user_id }}</td>
                    <td>{{ $m_users->level_id }}</td>
                    <td>{{ $m_users->username }}</td>
                    <td>{{ $m_users->nama }}</td>
                    <td>{{ $m_users->password }}</td>
                    <td>
                        <form action="{{ route('m_user.destroy', $m_users->user_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_users->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_users->user_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @endsection --}}
    @extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">CRUD USER</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Level ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Password</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($useri as $m_users)
                      <tr>
                    <td>{{ $m_users->user_id }}</td>
                    <td>{{ $m_users->level_id }}</td>
                    <td>{{ $m_users->username }}</td>
                    <td>{{ $m_users->nama }}</td>
                    <td>{{ $m_users->password }}</td>
                    <td>
                        <form action="{{ route('m_user.destroy', $m_users->user_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_users->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_users->user_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                    </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    @endsection
