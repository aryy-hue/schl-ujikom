@extends('layouts.master')
@section('headline', 'Data Table Perjalananan')
@section('comment',
    'Lorem ipsum dolor sit, amet consectetur adipisicing elit.
    Molestias harum illo ut? Distinctio incidunt obcaecati esse molestiae, velit quod laudantium corrupti fugiat a doloribus
    aliquam quaerat accusantium error non laboriosam illo et,
    porro dolores quas aperiam amet.
    Perferendis dolorum, fuga, quod asperiores ratione quaerat hic enim rerum debitis similique sit.',)
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
                                    <a type="button" class="btn btn-danger btn-circle" href="/delete/{{$datas->id}}" data-id="{{$datas->id}}" data-lokasi="{{$datas->lokasi}}"><i class="fas fa-trash"></i></a>
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
