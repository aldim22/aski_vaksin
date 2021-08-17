<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Peserta;
use App\Exports\peserta0Exports;
use App\Exports\peserta1Exports;

class formRegisterController extends Controller
{
    public function index() {
        return view('formRegister');
    }

    // BATCH 1
    //
    // public function search(Request $request) {
    //     if (isset($request->byNIK)) {
    //         $peserta = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->get();
    //         if ($peserta->isEmpty()) {
    //             $t = 'NIK anda tidak terdaftar.';
    //             return view('formRegister', ['peserta' => $peserta, 't' => $t]);
    //         } else if($peserta[0]->status_regist == 0) {
    //             $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
    //                 'status_regist' => 1,
    //                 'tanggal_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
    //             ]);
    //             $s = 'Anda berhasil registrasi.';
    //             return view('formRegister', ['peserta' => $peserta, 's' => $s]);
    //         } else {
    //             $d = 'Data duplikat! Anda sudah registrasi ulang.';
    //             return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
    //         }
    //     }
    // }

    // BATCH 2

    public function search(Request $request) {
        if (isset($request->byNIK)) {
            $peserta = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->get();
            if ($peserta->isEmpty()) {
                $t = 'NIK anda tidak terdaftar.';
                return view('formRegister', ['peserta' => $peserta, 't' => $t]);
            } else if($peserta[0]->status_regist_2 == 0) {
                if($peserta[0]->status_regist == 1) {
                    if($peserta[0]->tanggal_regist == date('m/d/Y')) {
                        $d = 'Data duplikat! Anda sudah registrasi ulang.';
                        return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
                    } else {
                        $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
                            'status_regist_2' => 1,
                            'tanggal_regist_2' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
                        ]);
                        $s = 'Anda berhasil registrasi dosis 2.';
                    } 
                } elseif($peserta[0]->status_regist == 0 && $peserta[0]->tanggal_regist < date('m/d/Y')) {
                    $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
                        'status_regist' => 1,
                        'tanggal_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
                    ]);
                    $s = 'Anda berhasil registrasi dosis 1.';
                } else {
                    $d = 'Data duplikat! Anda sudah registrasi ulang.';
                    return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
                }
                return view('formRegister', ['peserta' => $peserta, 's' => $s, 'd' => $d]);
            } else {
                $d = 'Data duplikat! Anda sudah registrasi ulang.';
                return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
            }
        }
    }

    public function indexStatus() {
        $satu = DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '0']])->whereDate('tanggal_regist', '=', '08-21-2021')->get();
        $dua = DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '1']])->whereDate('tanggal_regist_2', '=', '08-21-2021')->get();
        $tiga = DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '0']])->whereDate('tanggal_regist', '=', '08-22-2021')->get();
        $empat = DB::table('peserta')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '1']])->whereDate('tanggal_regist_2', '=', '08-22-2021')->get();
        $lima = DB::table('peserta')->where('status_regist', '=', '1')->whereDate('tanggal_regist', '<', '08-21-2021')->get();
        $enam = DB::table('peserta')->where('status_regist', '=', '0')->get();

        return view('formStatus', ['satu' => $satu, 'dua' => $dua, 'tiga' => $tiga, 'empat' => $empat, 'lima' => $lima, 'enam' => $enam]);
    }

    public function counterP() {
        $from = date('08-21-2021');
        $to = date('08-22-2021');
        echo DB::table('peserta')->where(function($query) use ($from, $to){
            $query->whereBetween('tanggal_regist', [$from, $to])
                  ->orWhereBetween('tanggal_regist_2', [$from, $to]);
          })->count();
    }

    public function excel0() {
        $nama_file = 'status_belum_regist'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta0Exports, $nama_file);
    }

    public function excel1() {
        $nama_file = '21-Agustus-2021 (Dosis 1)'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta1Exports, $nama_file);
    }

    public function excel2() {
        $nama_file = '21-Agustus-2021 (Dosis 2)'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta2Exports, $nama_file);
    }

    public function excel3() {
        $nama_file = '22-Agustus-2021 (Dosis 1)'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta3Exports, $nama_file);
    }

    public function excel4() {
        $nama_file = '22-Agustus-2021 (Dosis 2)'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta4Exports, $nama_file);
    }

    public function excel5() {
        $nama_file = 'status_sudah_regist'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new peserta5Exports, $nama_file);
    }
}

