@extends('layouts.master')
@section('title', 'Data User')
@section('headline', 'Data User')
@section('comment',
    'Ini adalah halaman user . Disini kita sebagai admin bisa melihat data data user yang sudah terdaftar',)
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            {{-- <th>Total Data</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($users as $datas)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $datas->nama }}</td>
                                <td>{{ bcrypt($datas->email) }}</td>
                                <td>{{ $datas->role }}</td>
                                {{-- <td>{{ $datas->count(Auth) }}</td> --}}
                                <td>
                                    <a type="button" class="btn btn-danger" href="/deleteUser/{{$datas->id}}">Delete</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $data->appends($_GET)->links() }} --}}
        </div>
    </div>
@endsection
