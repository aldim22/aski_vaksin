<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Peserta;
use App\Models\DetailPeserta;
use App\Models\Submitqr;
use PDF;
class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * Show the application level.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       return view('upload.index');

    }
    public function import(Request $request)
    {

        $tmp_file = $request->file('file');
        $spreadsheet = IOFactory::load($tmp_file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $rows    =count($sheetData) ;

             for ($i=3; $i <= $rows; $i++) {
            $answers[] = [
             'note'  => 'kosong',
            'nik' =>$sheetData[$i]['G'],
            'name'  => $sheetData[$i]['I'],
            'jenis_kelamin' => $sheetData[$i]['J'],
            'tanggal_lahir'  =>$sheetData[$i]['K'],
            'umur' => $sheetData[$i]['L'],
            'instansi' => $sheetData[$i]['M'],
            'jenis_pekerjaan'  => $sheetData[$i]['N'],
            'kode_kategori' => $sheetData[$i]['O'],
            'no_hp' => "-",
            'alamat_ktp'  => "-",
            'kode_pos'  => $sheetData[$i]['R'],
            'kabupaten' =>$sheetData[$i]['S'],
            'nip'  => $sheetData[$i]['T'],
            'ip' => $sheetData[$i]['U'],
            'status'  =>$sheetData[$i]['V'],
            'hubungan_keluarga' => $sheetData[$i]['W'],
            'email' => $sheetData[$i]['X'],
            'tempat_lahir'  => $sheetData[$i]['Y'],
            'status_kawin' => $sheetData[$i]['Z'],
            'faskes' => $sheetData[$i]['AA'],
            'lokasi_vaksin'  => "ON SITE PT. ASKI",
            'customer_journey'  => $sheetData[$i]['AC'],
            'bagian'  => $sheetData[$i]['D'],
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'status_regist'=>null,
            'tanggal_regist'=>Carbon::now(),
            'waktu_vaksin'=>$sheetData[$i]['E'],
            'tanggal_vaksin'=>$sheetData[$i]['F'],
            'keterangan'=>$sheetData[$i]['C'],
                ];
            }

        $insert_data = collect($answers);
//return $insert_data;
        $chunks = $insert_data->chunk(1000);

        foreach ($chunks as $chunk)
        {
            \DB::table('peserta')->insert($chunk->toArray());
        }
        return "success";

    }
    public function submit_qr(Request $request)
    {
         //return response()->json(['success'=>'Generate Success']); 
        $check = DB::table('detail_peserta')->where('nik',$request->nik)->first();
        $checksubmit = DB::table('submit_qr')->where('nik',$request->nik)->first();

        if ($check ==true) {
           if ($checksubmit ==true) {
               return response()->json([
                'success'=>'ada',
                'id'=>$check->id,
                'name'=>$check->nama,
                'qr'=>$checksubmit->qr,
                'nik'=>$check->nik,
                 'status_dosis'=>$check->status_dosis,
                // 'umur'=>$check->umur,
                // 'nip'=>$check->nip,
                'status'=>$check->status,
                'hubungan_keluarga'=>$check->hubungan_keluarga,
                'tanggal_lahir'=>$check->tgl_lahir,
                'waktu_vaksin'=>$check->tgl_reservasi,
                'tanggal_vaksin'=>$check->slot
            ]);
           }else{
               
                $insert = DB::table('submit_qr')->insert([
                    'nik'=>$request->nik,
                    'qr'=>$request->nik.'-'.$check->tgl_lahir,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
                if ($insert) {
                    $get = DB::table('submit_qr')->where('nik',$request->nik)->first();
                    if ($get ==true) {
                     
                    return response()->json([
                        'success'=>'berhasil',
                        'id'=>$check->id,
                        'name'=>$check->nama,
                        'qr'=>$get->qr,
                        'nik'=>$check->nik,
                         'status_dosis'=>$check->status_dosis,
                        // 'umur'=>$check->umur,
                        // 'nip'=>$check->nip,
                        'status'=>$check->status,
                        'hubungan_keluarga'=>$check->hubungan_keluarga,
                        'tanggal_lahir'=>$check->tgl_lahir,
                        'waktu_vaksin'=>$check->tgl_reservasi,
                        'tanggal_vaksin'=>$check->slot
                    ]);
                    }
                }
                
           }
        }else{
            return response()->json(['success'=>'maap anda belum terdaftar']); 
        }
        
   }
   public function download($nik)
   {
       $peserta = DetailPeserta::where('id',$nik)->first();
       
       $submit = Submitqr::where('nik',$peserta->nik)->first();
       $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($submit->qr));

        $pdf = PDF::loadview('download',['qrcode'=>$qrcode,'peserta'=>$peserta]);
        return $pdf->download('kartu_vaksin_'.$peserta->nik.'.pdf');
   }


}
