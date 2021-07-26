<?php
    use DB;

    $counter = DB::table('peserta')->where('status_regist', '=', '1')->count();
?>

<span style="text-align: center; font-size: 50px; display: block"><b><a href="{{ route('getFormStatus') }}" style="text-decoration: none; color: black">Total Peserta Registrasi: </a> {{ $counter }}</b></span>
<span style="text-align: center; font-size: 20px; margin-bottom: 15px;" class="d-block" id='ct7'></span>