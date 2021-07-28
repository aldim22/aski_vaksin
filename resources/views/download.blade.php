<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 60.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>
<center><h1>KARTU VAKSIN</h1></center>
<div class="row">
  <div class="column" style="">
   	<img src="data:image/png;base64, {!! $qrcode !!}">	
  </div>
  <div class="column" style="">
  <p>Tanggal : <b>{{ $peserta->waktu_vaksin }}</b></p>
  <p>Jam : <b>{{ $peserta->tanggal_vaksin }}</b></p>
  <p>Nama : <b>{{ $peserta->name }}</b></p>
	<p>Tanggal Lahir :<b>{{ $peserta->tanggal_lahir }}</b></p> 
	<p>Nik : <b>{{ $peserta->nik }}</b></p> 
	<p>Status : <b>{{ $peserta->status }}</b></p> 
	<p>Hubungan Keluarga : <b>{{ $peserta->hubungan_keluarga }}</b></p> 
  </div>
</div>


</body>
</html>
