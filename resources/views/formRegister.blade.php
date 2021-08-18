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

    <title>Form Registrasi</title>

    <link href="assets/img/aski.png" rel="icon">
    <link href="assets/img/aski.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="css/src/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color: #f1f2f4">
    <div class="container-fluid bg-img">
        <div class="row">
            <div class="col">
                <span style="text-align: center; font-size: 40px; display: block"><b><a href="{{ route('getFormStatus') }}" style="text-decoration: none; color: black" target="_blank">Total Peserta Registrasi: </a></b> <b id="counterP"></b></span><hr>
                <div class="row text-center">
                    <div class="col">
                        <b>Sabtu, 21 Agustus 2021</b><br>
                        Dosis 1: <b>{{ DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '0']])->whereDate('tanggal_regist', '=', '08-21-2021')->count() }}</b><br>
                        Dosis 2: <b>{{ DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '1']])->whereDate('tanggal_regist_2', '=', '08-21-2021')->count() }}</b>
                    </div>
                    <div class="col">
                        <b>Minggu, 22 Agustus 2021</b><br>
                        Dosis 1: <b>{{ DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '0']])->whereDate('tanggal_regist', '=', '08-22-2021')->count() }}</b><br>
                        Dosis 2: <b>{{ DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '1']])->whereDate('tanggal_regist_2', '=', '08-22-2021')->count() }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row content-section">
            <div class="col-sm-8">
                <div class="card" style="height: 465px;">
                    <div class="row">
                        <div class="col cover-card"></div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="text-center">Form Registrasi</h4>
                                <hr>
                                <div class="text-center">
                                    <img class="avatar" src="{{ asset('assets/avatar.png') }}" alt="">
                                    <br>
                                    @if (isset($peserta))
                                        @foreach($peserta as $p)
                                        <b>{{ $p->nik }}</b> - {{ $p->name }}
                                        @endforeach
                                    @endif
                                    @if (!isset($peserta))
                                        NIK - Nama
                                    @endif
                                </div>
                                <br>
                                @if (isset($peserta))
                                    @if ($peserta->isEmpty())
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-message text-center">
                                            <strong>{{ $t }}</strong><br>
                                            &nbsp;
                                        </div>
                                    </div>
                                    @elseif($peserta[0]->status_regist_2 == 0)
                                        @if($peserta[0]->status_regist == 1)
                                            @if($peserta[0]->tanggal_regist >= date('Y-m-d'))
                                            <div class="alert alert-warning" role="alert">
                                                <div class="alert-message text-center">
                                                    <strong>{{ $d }}</strong><br>
                                                    -
                                                </div>
                                            </div>
                                            @else
                                            <div class="alert alert-success" role="alert">
                                                <div class="alert-message text-center">
                                                    <strong>{{ $s }}</strong><br>

                                                    <?php
                                                        $date = date('Y/m/d H:i:s', strtotime('+ 7 Hours'));
                                                    ?>

                                                    Tanggal Registrasi: {{ $date }}
                                                </div>
                                            </div>
                                            @endif
                                        @elseif($peserta[0]->status_regist == 0 && $peserta[0]->tanggal_regist < date('m/d/Y'))
                                        <div class="alert alert-success" role="alert">
                                            <div class="alert-message text-center">
                                                <strong>{{ $s }}</strong><br>

                                                <?php
                                                    $date = date('Y/m/d H:i:s', strtotime('+ 7 Hours'));
                                                ?>

                                                Tanggal Registrasi: {{ $date }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning" role="alert">
                                            <div class="alert-message text-center">
                                                <strong>{{ $d }}</strong><br>
                                                -
                                            </div>
                                        </div>
                                        @endif
                                    @else
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-message text-center">
                                            <strong>{{ $d }}</strong><br>
                                            -
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if (!isset($peserta))
                                <div class="alert" style="background-color: #f1f2f4" role="alert">
                                    <div class="alert-message text-center">
                                        <strong>Scan QR anda.</strong><br>
                                        -
                                    </div>
                                </div>
                                @endif
                                <br>
                                <form action="{{ route('getFormSearch') }}" method="post"> 
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="inputbyNIK" type="text" class="form-control" name="byNIK" placeholder="NIK" aria-describedby="button-addon2" autofocus required>
                                    <button class="btn btn-secondary" type="submit" id="button-addon2">Registrasi</button>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('getForm') }}" style="text-decoration: none; color: gray">[Refresh]</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
                
            <div class="col-sm-4 card-peserta">
                <div class="row">
                    <div class="col">
                        
                    </div>
                </div>
                <div class="card" style="height: 465px; overflow: scroll">
                    <div class="card-header text-center bg-white" style="font-size: 1rem">Data Peserta</div>
                    <div class="card-body table-responsive">
                        @if (isset($peserta))
                        <table class="table" cellspacing="0" width="100%">
                            <tbody>
                                @foreach($peserta as $p)
                                <tr>
                                    <th>NIK</th>
                                    <td>{{ $p->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Vaksin</th>
                                    <td class="text-capitalize">{{ $p->waktu_vaksin }}</td>
                                </tr>
                                <tr>
                                    <th>Jam</th>
                                    <td class="text-capitalize">{{ $p->tanggal_vaksin }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td class="text-capitalize">{{ $p->name }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ $p->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td>{{ $p->instansi }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td>{{ $p->nip }}</td>
                                </tr>
                                <tr>
                                    <th>IP</th>
                                    <td>{{ $p->ip }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $p->status }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Keluarga</th>
                                    <td>{{ $p->hubungan_keluarga }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi Vaksin</th>
                                    <td>{{ $p->lokasi_vaksin }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/src/bootstrap.min.js"></script>
    <script src="js/src/jquery-3.6.0.min.js"></script>
    <script>
        function getCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('getFormCounter') }}"
            })
            .done(function( data ) {
                $('#counterP').html(data);
                setTimeout(getCount, 30000);
            });
        }
        getCount()
    </script>
</body>

</html>
