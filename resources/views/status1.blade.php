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
    <h4 class="text-center"><b>Status Sudah Registrasi</b></h1>
    <br><br>
    <table class="table table-bordered" style="font-size: 10px" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Instansi</th>
                <th class="text-center">Status</th>
                <th class="text-center">Tanggal Registrasi</th>
                <th class="text-center">Jadwal Vaksin</th>
            </tr>
        </thead>
        <tbody>
        @foreach($status1 as $s)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $s->nik }}</td>
                <td class="text-center">{{ $s->name }}</td>
                <td class="text-center">{{ $s->jenis_kelamin }}</td>
                <td class="text-center">{{ $s->instansi }}</td>
                <td class="text-center"><b class="text-center text-success">Sudah Registrasi</b></td>
                <td class="text-center">{{ $s->tanggal_regist }}</td>
                <td>{{ $s->waktu_vaksin }} {{ $s->tanggal_vaksin }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>