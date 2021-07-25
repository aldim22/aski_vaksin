<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ASKI VAKSIN">
	<meta name="author" content="">

	<link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Form Registrasi</title>

    <link rel="stylesheet" href="{{ URL::asset('css/src/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/src/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
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
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sudah as $s)
                                    <tr>
                                        <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                        <td scope="row">{{ $s->nik }}</td>
                                        <td scope="row">{{ $s->name }}</td>
                                        <td scope="row">{{ $s->jenis_kelamin }}</td>
                                        <td scope="row">{{ $s->instansi }}</td>
                                        <td class="text-center" scope="row"><b class="text-center text-success">Sudah Registrasi</b></td>
                                        <td class="text-center" scope="row">{{ $s->tanggal_regist }}</td>
                                        </td>
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
                                        </td>
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

    <script src="{{ URL::asset('js/src/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/src/datatables.min.js') }}"></script>
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