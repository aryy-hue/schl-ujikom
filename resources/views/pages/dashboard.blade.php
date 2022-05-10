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
                                    <a type="button" class="btn btn-danger btn-circle" href="#" data-target="#hapusData" data-toggle="modal"><i class="fas fa-trash" ></i></a>
                                </td>
                            </tr>
                            {{-- notifikasi  --}}
                            <div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Data {{$datas->lokasi}} akan terhapus.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger" href="/delete/{{$datas->id}}">Hapus Data</a>
                                    </div>
                                </div>
                            </div>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                <a href="/cetak_PDF" class="btn btn-sec" target="_blank">CETAK PDF</a>
            </div>
        </div>
            {{-- {{ $data->appends($_GET)->links() }} --}}
        </div>
    </div>
@endsection
