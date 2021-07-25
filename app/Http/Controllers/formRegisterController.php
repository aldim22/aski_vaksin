<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class formRegisterController extends Controller
{
    public function index() {
        return view('formRegister');
    }

    public function search(Request $request) {
        if (isset($request->byNIK)) {
            $peserta = DB::table('peserta')->where(['nik' => $request->byNIK])->get();
            if(!isset($peserta[0]->status_regist)) {
                $t = 'Mohon maaf, NIK anda tidak terdaftar.';
                return view('formRegister', ['peserta' => $peserta, 't' => $t]);
            } else if($peserta[0]->status_regist == 0) {
                $status = DB::table('peserta')->where(['nik' => $request->byNIK])->update([
                    'status_regist' => 1,
                    'tanggal_regist' => date('d/m/Y H:i:s', strtotime('+ 7 Hours'))
                ]);
                $s = 'Anda berhasil registrasi.';
                return view('formRegister', ['peserta' => $peserta, 's' => $s]);
            } else {
                $d = 'Data duplikat! Anda sudah registrasi ulang.';
                return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
            }
        }
    }

    public function indexStatus() {
        $belum = DB::table('peserta')->where('status_regist', '=', '0')->get();
        $sudah = DB::table('peserta')->where('status_regist', '=', '1')->get();

        return view('formStatus', ['belum' => $belum, 'sudah' => $sudah]);
    }
    
}
