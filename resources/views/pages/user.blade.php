@extends('layouts.master')
@section('headline', 'Data User')
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
                            <th>Nama</th>
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
                                <td>{{ bcrypt($datas->email) }}</td>
                                <td>{{ $datas->role }}</td>
                                <td>$320,800</td>
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
