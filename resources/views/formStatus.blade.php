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
            $count1 = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 1'], ['status_regist', '=', '1']])->whereDate('tgl_regist', '=', '08-21-2021')->count();
            $count2 = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 2'], ['status_regist', '=', '2']])->whereDate('tgl_regist', '=', '08-21-2021')->count();
            $count3 = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 1'], ['status_regist', '=', '1']])->whereDate('tgl_regist', '=', '08-22-2021')->count();
            $count4 = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 2'], ['status_regist', '=', '2']])->whereDate('tgl_regist', '=', '08-22-2021')->count();
            $count5 = DB::table('peserta')->where('status_regist', '=', '1')->count();
            $count6 = DB::table('peserta')->where('status_regist', '=', '0')->count();
        ?>

        <h3 class="text-center"><b>Status Registrasi</b></h3><br>
        <div class="row ">
            <div class="col">
                <div class="accordion" id="accordionExample" style="margin-bottom: 20px">

                    <!-- 1 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span>22 Agustus 2021 (Dosis 1) <b>[{{ $count1 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/1') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
                                <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Status Dosis</th>
                                            <th class="text-center">Reservasi</th>
                                            <th class="text-center">Slot</th>
                                            <th class="text-center">Tanggal Registrasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($satu as $sat)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $sat->nik }}</td>
                                            <td class="text-center">{{ $sat->nama }}</td>
                                            <td class="text-center">{{ $sat->tgl_lahir }}</td>
                                            <td class="text-center">{{ $sat->status_dosis }}</td>
                                            <td class="text-center">{{ $sat->tgl_reservasi }}</td>
                                            <td class="text-center">{{ $sat->slot }}</td>
                                            <td class="text-center">{{ $sat->tgl_regist }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <span>22 Agustus 2021 (Dosis 2) <b>[{{ $count2 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/2') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
                                <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Status Dosis</th>
                                            <th class="text-center">Reservasi</th>
                                            <th class="text-center">Slot</th>
                                            <th class="text-center">Tanggal Registrasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dua as $du)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $du->nik }}</td>
                                            <td class="text-center">{{ $du->nama }}</td>
                                            <td class="text-center">{{ $du->tgl_lahir }}</td>
                                            <td class="text-center">{{ $du->status_dosis }}</td>
                                            <td class="text-center">{{ $du->tgl_reservasi }}</td>
                                            <td class="text-center">{{ $du->slot }}</td>
                                            <td class="text-center">{{ $du->tgl_regist }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <span>21 Agustus 2021 (Dosis 1) <b>[{{ $count3 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/3') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
                                <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Status Dosis</th>
                                            <th class="text-center">Reservasi</th>
                                            <th class="text-center">Slot</th>
                                            <th class="text-center">Tanggal Registrasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tiga as $tig)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $tig->nik }}</td>
                                            <td class="text-center">{{ $tig->nama }}</td>
                                            <td class="text-center">{{ $tig->tgl_lahir }}</td>
                                            <td class="text-center">{{ $tig->status_dosis }}</td>
                                            <td class="text-center">{{ $tig->tgl_reservasi }}</td>
                                            <td class="text-center">{{ $tig->slot }}</td>
                                            <td class="text-center">{{ $tig->tgl_regist }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- 4 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <span>21 Agustus 2021 (Dosis 2) <b>[{{ $count4 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/4') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
                                <table class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Status Dosis</th>
                                            <th class="text-center">Reservasi</th>
                                            <th class="text-center">Slot</th>
                                            <th class="text-center">Tanggal Registrasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($empat as $emp)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $emp->nik }}</td>
                                            <td class="text-center">{{ $emp->nama }}</td>
                                            <td class="text-center">{{ $emp->tgl_lahir }}</td>
                                            <td class="text-center">{{ $emp->status_dosis }}</td>
                                            <td class="text-center">{{ $emp->tgl_reservasi }}</td>
                                            <td class="text-center">{{ $emp->slot }}</td>
                                            <td class="text-center">{{ $emp->tgl_regist }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- 5 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            <span>30 Juli 2021 - 1 Agustus 2021 (Sudah) <b>[{{ $count5 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/5') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
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
                                    @foreach($lima as $lim)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $lim->nik }}</td>
                                            <td class="text-center">{{ $lim->name }}</td>
                                            <td class="text-center">{{ $lim->jenis_kelamin }}</td>
                                            <td class="text-center">{{ $lim->instansi }}</td>
                                            <td class="text-center"><b class="text-center text-success">Sudah Registrasi</b></td>
                                            <td class="text-center">{{ $lim->tanggal_regist }}</td>
                                            <td>{{ $lim->waktu_vaksin }} {{ $lim->tanggal_vaksin }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- 6 -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <span>30 Juli 2021 - 1 Agustus 2021 (Belum) <b>[{{ $count6 }}]</b></span>
                        </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{ URL::to('/registrasi/status/0') }}"><button type="button" class="btn btn-success" id="btn-input" style="width: 100%"><i class="fas fa-print"></i> Cetak Excel</button></a><br><br>
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
                                    @foreach($enam as $ena)
                                        <tr>
                                            <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                            <td scope="row">{{ $ena->nik }}</td>
                                            <td scope="row">{{ $ena->name }}</td>
                                            <td scope="row">{{ $ena->jenis_kelamin }}</td>
                                            <td scope="row">{{ $ena->instansi }}</td>
                                            <td class="text-center" scope="row"><b class="text-danger">Belum Registrasi</b></td>
                                            <td class="text-center" scope="row">-</td>
                                            <td>{{ $ena->waktu_vaksin }} {{ $ena->tanggal_vaksin }}</td>
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
