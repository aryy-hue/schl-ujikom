@extends('layouts.master')
@section('headline', 'Data Table Perjalananan')
@section('title', 'Data Perjalananan')
@section('comment',
    'Tampilan data perjalanan')
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
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Suhu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $datas)
                        <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $datas->lokasi }}</td>
                                <td>{{ $datas->tanggal }}</td>
                                <td>{{ $datas->jam }}</td>
                                <td>{{ $datas->suhu }}</td>
                                <td>
                                    <a type="button" class="btn btn-info btn-circle" href="/dashboard/{{$datas->id}}"><i class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $datas->lokasi }}')" href="/delete/{{$datas->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                <a href="/cetak_PDF" class="btn btn-sec" target="_blank">CETAK PDF</a>
            </div>
        </div>
        </div>
    </div>
@endsection