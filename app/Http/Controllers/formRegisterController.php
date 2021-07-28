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
            $peserta = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->get();
            if ($peserta->isEmpty()) {
                $t = 'NIK anda tidak terdaftar.';
                return view('formRegister', ['peserta' => $peserta, 't' => $t]);
            } else if($peserta[0]->status_regist == 0) {
                $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
                    'status_regist' => 1,
                    'tanggal_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
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
        $sudah = DB::table('peserta')->where('status_regist', '=', '1')->orderBy('tanggal_regist', 'desc')->get();

        return view('formStatus', ['belum' => $belum, 'sudah' => $sudah]);
    }

    public function counterP() {
        echo DB::table('peserta')->where('status_regist', '=', '1')->count();
    }
    
}
