<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title></title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        table, th, td {
            border: 1px solid gray;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h4 class="text-center"><b>Status Belum Registrasi</b></h1>
    <br><br>
    <table class="table table-bordered" style="font-size: 10px" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">NIK</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Jenis Kelamin</th>
                <th class="text-center" scope="col">Instansi</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Tanggal Registrasi</th>
                <th class="text-center" scope="col">Jadwal Vaksin</th>
            </tr>
        </thead>
        <tbody>
        @foreach($status0 as $b)
            <tr>
                <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                <td scope="row">{{ $b->nik }}</td>
                <td scope="row">{{ $b->name }}</td>
                <td scope="row">{{ $b->jenis_kelamin }}</td>
                <td scope="row">{{ $b->instansi }}</td>
                <td class="text-center" scope="row"><b class="text-danger">Belum Registrasi</b></td>
                <td class="text-center" scope="row">-</td>
                <td>{{ $b->waktu_vaksin }} {{ $b->tanggal_vaksin }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>