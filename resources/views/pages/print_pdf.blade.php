<!DOCTYPE html>
<html>
<head>
	<title>Data Perjalanan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Suhu</th>
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
                </tr>
                <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
 
</body>
</html>