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
                $message = 'Data tidak terdaftar';
                return view('formRegister', ['peserta' => $peserta, 'message' => $message]);
            } else if($peserta[0]->status_regist == 0) {
                // $status = DB::table('peserta')->where(['nik' => $request->byNIK])->update([
                //     'status_regist' => 1,
                // ]);
                $message = 'Berhasil registrasi';
                return view('formRegister', ['peserta' => $peserta, 'message' => $message]);
            } else {
                $message = 'Data duplikat! Anda sudah registrasi ulang';
                return view('formRegister', ['peserta' => $peserta, 'message' => $message]);
            }
        }
    }

    public function indexStatus() {
        $belum = DB::table('peserta')->where('status', '=', '0')->get();
        $sudah = DB::table('peserta')->where('status', '=', '1')->get();

        return view('formStatus', ['belum' => $belum, 'sudah' => $sudah]);
    }
    
}
