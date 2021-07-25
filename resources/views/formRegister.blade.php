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
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-img">
        <div class="row content-section">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col">

                        <?php
                            $counter = DB::table('peserta')->where('status_regist', '=', '1')->count();
                        ?>

                        <span style="text-align: left; font-size: 50px"" class="d-block" ><b><a href="{{ url::route('getFormStatus') }}" style="text-decoration: none; color: black">Total Registrasi: </a></b> {{ $counter }}</span>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col cover-card"></div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="text-center">Form Registrasi</h4>
                                <hr><br>
                                <div class="text-center">
                                    <img class="avatar" src="{{ URL::asset('assets/avatar.png') }}" alt="">
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
                                <div class="alert alert-secondary" role="alert">
                                    <div class="alert-message text-center">
                                        <strong>-</strong>
                                    </div>
                                </div>
                                @endif
                                <br>
                                <form action="{{ URL::route('getFormSearch') }}" method="post"> 
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="byNIK" placeholder="NIK" aria-describedby="button-addon2" required>
                                    <button class="btn btn-secondary" type="submit" id="button-addon2">Registrasi</button>
                                </div>
                                @if (isset($peserta))
                                <div class="text-center">
                                    <a href="{{ url::route('getForm') }}" style="text-decoration: none; color: gray">[Refresh]</a>
                                </div>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
                
            <div class="col-sm-4">
                <div class="row">
                    <div class="col">
                        <span style="text-align: left" class="d-block" id='ct7'></span>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <span>&nbsp;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center" style="font-size: 1rem">Data Peserta</div>
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
                                    <th>Umur</th>
                                    <td>{{ $p->umur }}</td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td>{{ $p->instansi }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>{{ $p->jenis_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $p->kode_kategori }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>{{ $p->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $p->alamat_ktp }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Pos</th>
                                    <td>{{ $p->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td>{{ $p->kabupaten }}</td>
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
                                    <th>Email</th>
                                    <td class="text-lowercase">{{ $p->email }}</td>
                                </tr>
                                <tr>
                                    <th>Status Kawin</th>
                                    <td>{{ $p->status_kawin }}</td>
                                </tr>
                                <tr>
                                    <th>Faskes</th>
                                    <td>{{ $p->faskes }}</td>
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

    <script src="{{ URL::asset('js/src/bootstrap.min.js') }}"></script>
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 24;
            hours = hours ? hours : 24;
            hours=hours.toString().length==1? 0+hours.toString() : hours;

            var minutes=x.getMinutes().toString()
            minutes=minutes.length==1 ? 0+minutes : minutes;

            var seconds=x.getSeconds().toString()
            seconds=seconds.length==1 ? 0+seconds : seconds;

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