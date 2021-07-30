<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ASKI VAKSIN">
	<meta name="author" content="">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Status Registrasi</title>

    <link href="assets/img/aski.png" rel="icon">
    <link href="assets/img/aski.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('css/src/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/src/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color: #f1f2f4">
    <div class="container-fluid status-container">

        <?php
            $countS = DB::table('peserta')->where('status_regist', '=', '1')->count();
            $countB = DB::table('peserta')->where('status_regist', '=', '0')->count();
        ?>

        <h3 class="text-center"><b>Status Registrasi</b></h3><br>
        <div class="row ">
            <div class="col">
                <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span>Sudah Registrasi <b>[{{ $countS }}]</b></span>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="{{ URL::to('/registrasi/status/1') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak PDF</button></a><br><br>
                            <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
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
                                @foreach($sudah as $s)
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
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>Belum Registrasi <b>[{{ $countB }}]</b></span>
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="{{ URL::to('/registrasi/status/0') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak PDF</button></a><br><br>
                            <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
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
                                @foreach($belum as $b)
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
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/src/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/src/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('table.display').DataTable( {
                responsive: true,
                info: false,
            })
        } );
    </script>
</body>

</html>
