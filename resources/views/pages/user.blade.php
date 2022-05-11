@extends('layouts.master')
@section('title', 'Data User')
@section('headline', 'Data User')
@section('comment',
    'Ini adalah halaman user . Disini kita sebagai admin bisa melihat data data user yang sudah terdaftar',)
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-sec">DataTables </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($users as $datas)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $datas->nama }}</td>
                                <td>{{ $datas->negara }}</td>
                                <td>{{ bcrypt($datas->email) }}</td>
                                <td>{{ $datas->role }}</td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $datas->nama }} dengan ID {{ $datas->id }}')" href="/deleteUser/{{$datas->id}}">Delete</a>
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
