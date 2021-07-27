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
                <span style="text-align: center; font-size: 50px; display: block"><b><a href="{{ route('getFormStatus') }}" style="text-decoration: none; color: black">Total Peserta Registrasi: </a></b> <b id="counterP">{{ DB::table('peserta')->where('status_regist', '=', '1')->count() }}</b></span>
                <span style="text-align: center; font-size: 20px; margin-bottom: 15px;" class="d-block" id='ct7'></span>
            </div>
        </div>
        <div class="row content-section">
            <div class="col-sm-8">
                <div class="card" style="height: 465px;">
                    <div class="row">
                        <div class="col cover-card"></div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="text-center">Form Registrasi ASKI Vaksin</h4>
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
                                    @elseif($peserta[0]->status_regist == 0)
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-message text-center">
                                            <strong>{{ $s }}</strong><br>

                                            <?php
                                                $date = date('Y/m/d H:i:s', strtotime('+ 7 Hours'));
                                            ?>

                                            Tanggal Registrasi: {{ $date }}
                                        </div>
                                    </div>
                                    @elseif($peserta[0]->status_regist == 1)
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-message text-center">
                                            <strong>{{ $d }}</strong><br>
                                            @foreach($peserta as $p)
                                                 Tanggal Registrasi: {{ $p->tanggal_regist }}
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if (!isset($peserta))
                                <div class="alert" style="background-color: #f1f2f4" role="alert">
                                    <div class="alert-message text-center">
                                        <strong>Masukkan NIK anda dibawah ini:</strong><br>
                                        -
                                    </div>
                                </div>
                                @endif
                                <br>
                                <form action="{{ route('getFormSearch') }}" method="post"> 
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="inputbyNIK" type="number" class="form-control" name="byNIK" placeholder="NIK" aria-describedby="button-addon2" autofocus required>
                                    <button class="btn btn-info" type="submit" id="button-addon2">Registrasi</button>
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
                                    <th>Tempat Lahir</th>
                                    <td>{{ $p->tempat_lahir }}</td>
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

    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <a href="https://grin.co.id/"><img src="assets/img/grin.png" alt="" width="300px" height="auto"></a>
                    </div>
                    <div class="col-sm-4 col-md-3 item"></div>
                    <div class="col-lg-3 item social" style="margin-top: -30px;">
                        <a href="https://www.facebook.com/askigrin">
                            <i class="icon ion-social-facebook"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/grinbyaski">
                            <i class="icon ion-social-youtube"></i>
                        </a>
                        <a href="https://www.instagram.com/aski_innovation/">
                            <i class="icon ion-social-instagram"></i>
                        </a>
                        <br><br>
                        <p><a style="color: #3fbbc0; text-decoration: none" href="https://grin.co.id/">www.grin.co.id</a></p>
                        <p class="copyright">PT Astra Komponen Indonesia</p>
                    </div>
                </div>
            </div>
        </footer>
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
    <script>
        function display_ct7() {
            var x = new Date()
            var hours = x.getHours();
            var minutes = x.getMinutes();
            var seconds = x.getSeconds();
            if(hours <10 ){hours='0'+hours;}
            if(minutes <10 ) {minutes='0' + minutes; }
            if(seconds<10){seconds='0' + seconds;}

            var month=(x.getMonth() +1).toString();
            month=month.length==1 ? 0+month : month;

            var dt=x.getDate().toString();
            dt=dt.length==1 ? 0+dt : dt;

            var x1=x.getFullYear() + "/" + month + "/" + dt; 
            x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7(){
            var refresh=1000;
            mytime=setTimeout('display_ct7()',refresh)
        }
        display_c7()
    </script>
</body>

</html>
