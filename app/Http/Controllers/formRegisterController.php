<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\peserta1Exports;
use App\Exports\peserta2Exports;
use App\Exports\peserta3Exports;
use App\Exports\peserta4Exports;
use App\Exports\peserta5Exports;

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
            $peserta = DB::table('detail_peserta')->select('detail_peserta.*', 'submit_qr.*')->join('submit_qr', 'detail_peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->get();
            if ($peserta->isEmpty()) {
                $t = 'NIK anda tidak terdaftar.';
                return view('formRegister', ['peserta' => $peserta, 't' => $t]);
            } elseif($peserta[0]->status_dosis == "Dosis 1") {
                if($peserta[0]->status_regist == 0) {
                    $status = DB::table('detail_peserta')->select('detail_peserta.*', 'submit_qr.*')->join('submit_qr', 'detail_peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
                        'status_regist' => 1,
                        'tgl_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
                    ]);
                    $s = 'Anda berhasil registrasi dosis 1.';
                    return view('formRegister', ['peserta' => $peserta, 's' => $s]); 
                } elseif($peserta[0]->status_regist == 1) {
                    $d = 'Anda sudah registrasi ulang.';
                    return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
                } 
            } elseif($peserta[0]->status_dosis == "Dosis 2") {
                if($peserta[0]->status_regist == 0) {
                    $status = DB::table('detail_peserta')->select('detail_peserta.*', 'submit_qr.*')->join('submit_qr', 'detail_peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
                        'status_regist' => 2,
                        'tgl_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
                    ]);
                    $s = 'Anda berhasil registrasi dosis 2.';
                    return view('formRegister', ['peserta' => $peserta, 's' => $s]); 
                } elseif($peserta[0]->status_regist == 2) {
                    $d = 'Anda sudah registrasi ulang.';
                    return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
                } 
            }
        }
    }

    // public function search(Request $request) {
    //     if (isset($request->byNIK)) {
    //         $peserta = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->get();
    //         if ($peserta->isEmpty()) {
    //             $t = 'NIK anda tidak terdaftar.';
    //             return view('formRegister', ['peserta' => $peserta, 't' => $t]);
    //         } else if($peserta[0]->status_regist_2 == 0) {
    //             if($peserta[0]->status_regist == 1) {
    //                 if($peserta[0]->tanggal_regist >= date('Y-m-d')) {
    //                     $d = 'Anda sudah registrasi ulang.';
    //                     return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
    //                 } else {
    //                     $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
    //                         'status_regist_2' => 1,
    //                         'tanggal_regist_2' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
    //                     ]);
    //                     $s = 'Anda berhasil registrasi dosis 2.';
    //                     return view('formRegister', ['peserta' => $peserta, 's' => $s]);
    //                 } 
    //             } elseif($peserta[0]->status_regist == 0 && $peserta[0]->tanggal_regist < date('m/d/Y')) {
    //                 $status = DB::table('peserta')->select('peserta.*', 'submit_qr.*')->join('submit_qr', 'peserta.nik', '=', 'submit_qr.nik')->where(['submit_qr.qr' => $request->byNIK])->update([
    //                     'status_regist' => 1,
    //                     'tanggal_regist' => date('m/d/Y H:i:s', strtotime('+ 7 Hours'))
    //                 ]);
    //                 $s = 'Anda berhasil registrasi dosis 1.';
    //                 return view('formRegister', ['peserta' => $peserta, 's' => $s]);
    //             } else {
    //                 $d = 'Anda sudah registrasi ulang.';
    //                 return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
    //             }
    //         } else {
    //             $d = 'Anda sudah registrasi ulang.';
    //             return view('formRegister', ['peserta' => $peserta, 'd' => $d]);
    //         }
    //     }
    // }

    public function indexStatus() {
        $satu = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 1'], ['status_regist', '=', '1']])->whereDate('tgl_regist', '=', '08-21-2021')->get();
        $dua = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 2'], ['status_regist', '=', '2']])->whereDate('tgl_regist', '=', '08-21-2021')->get();
        $tiga = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 1'], ['status_regist', '=', '1']])->whereDate('tgl_regist', '=', '08-22-2021')->get();
        $empat = DB::table('detail_peserta')->where([['status_dosis', '=', 'Dosis 2'], ['status_regist', '=', '2']])->whereDate('tgl_regist', '=', '08-22-2021')->get();
        $lima = DB::table('detail_peserta')->where('status_regist', '=', '0')->get();;

        return view('formStatus', ['satu' => $satu, 'dua' => $dua, 'tiga' => $tiga, 'empat' => $empat, 'lima' => $lima]);
    }

    public function counterP() {
        echo DB::table('detail_peserta')->where('status_regist', '=', '1')->orWhere('status_regist', '=', '2')->count();
    }

    public function percentP() {
        $total = DB::table('detail_peserta')->count();
        $totalP = DB::table('detail_peserta')->where('status_regist', '=', '1')->orWhere('status_regist', '=', '2')->count();
        $percentP = round($totalP / $total * 100, 2);

        echo $percentP;
    }

    public function excel1() {
        $nama_file = '22-Agustus-2021 (Dosis 1) '.date('m-d-Y H:i:s', strtotime('+ 7 Hours')).'.xlsx';
        return Excel::download(new peserta1Exports, $nama_file);
    }

    public function excel2() {
        $nama_file = '22-Agustus-2021 (Dosis 2) '.date('m-d-Y H:i:s', strtotime('+ 7 Hours')).'.xlsx';
        return Excel::download(new peserta2Exports, $nama_file);
    }

    public function excel3() {
        $nama_file = '21-Agustus-2021 (Dosis 1) '.date('m-d-Y H:i:s', strtotime('+ 7 Hours')).'.xlsx';
        return Excel::download(new peserta3Exports, $nama_file);
    }

    public function excel4() {
        $nama_file = '21-Agustus-2021 (Dosis 2) '.date('m-d-Y H:i:s', strtotime('+ 7 Hours')).'.xlsx';
        return Excel::download(new peserta4Exports, $nama_file);
    }

    public function excel5() {
        $nama_file = '2122-Agustus-2021-belum-regist '.date('m-d-Y H:i:s', strtotime('+ 7 Hours')).'.xlsx';
        return Excel::download(new peserta5Exports, $nama_file);
    }
}

