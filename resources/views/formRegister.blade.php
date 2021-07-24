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
        <div class="row ">
            <div class="col-sm-8">
                <div class="card bg-aski">
                        <div class="card-body">
                            @if (isset($peserta))
                                {{ $message }}
                            @endif
                            <form action="{{ URL::route('getFormSearch') }}" method="post"> 
                            @csrf
                                <input class="form-control input-search" name="byNIK" type="text" placeholder="Masukkan NIK">
                                <button type="submit" class="btn btn-warning btn-sm btn-search">Registrasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-sm-4">
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
                                        <td>{{ $p->name }}</td>
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
                                        <td>{{ $p->email }}</td>
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
    </div>

    <script src="{{ URL::asset('js/src/bootstrap.min.js') }}"></script>
</body>

</html>