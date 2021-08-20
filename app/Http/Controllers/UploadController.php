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
            //  'note'  => 'kosong',
            // 'nik' =>$sheetData[$i]['G'],
            // 'name'  => $sheetData[$i]['I'],
            // 'jenis_kelamin' => $sheetData[$i]['J'],
            // 'tanggal_lahir'  =>$sheetData[$i]['K'],
            // 'umur' => $sheetData[$i]['L'],
            // 'instansi' => $sheetData[$i]['M'],
            // 'jenis_pekerjaan'  => $sheetData[$i]['N'],
            // 'kode_kategori' => $sheetData[$i]['O'],
            // 'no_hp' => "-",
            // 'alamat_ktp'  => "-",
            // 'kode_pos'  => $sheetData[$i]['R'],
            // 'kabupaten' =>$sheetData[$i]['S'],
            // 'nip'  => $sheetData[$i]['T'],
            // 'ip' => $sheetData[$i]['U'],
            // 'status'  =>$sheetData[$i]['V'],
            // 'hubungan_keluarga' => $sheetData[$i]['W'],
            // 'email' => $sheetData[$i]['X'],
            // 'tempat_lahir'  => $sheetData[$i]['Y'],
            // 'status_kawin' => $sheetData[$i]['Z'],
            // 'faskes' => $sheetData[$i]['AA'],
            // 'lokasi_vaksin'  => "ON SITE PT. ASKI",
            // 'customer_journey'  => $sheetData[$i]['AC'],
            // 'bagian'  => $sheetData[$i]['D'],
            // 'created_at'=>Carbon::now(),
            // 'updated_at'=>Carbon::now(),
            // 'status_regist'=>null,
            // 'tanggal_regist'=>Carbon::now(),
            // 'waktu_vaksin'=>$sheetData[$i]['E'],
            // 'tanggal_vaksin'=>$sheetData[$i]['F'],
            // 'keterangan'=>$sheetData[$i]['C'],
            'nik'=>$sheetData[$i]['G'],
            'status_dosis'=>$sheetData[$i]['A'],
            'nama'=>$sheetData[$i]['J'],
            'tgl_reservasi'=>$sheetData[$i]['S'],
            'slot'=>$sheetData[$i]['T'],
            'note'=>$sheetData[$i]['U'],
            'email'=>$sheetData[$i]['I'],
            'tgl_lahir'=>$sheetData[$i]['L'],
            'hubungan_keluarga'=>$sheetData[$i]['E'],
            'status'=>$sheetData[$i]['D'],
            'ip' => $sheetData[$i]['B'],
            'nip'=> $sheetData[$i]['C'],
            'no_hp'=> $sheetData[$i]['H'],
            'tempat_lahir'=> $sheetData[$i]['K'],
            'jenis_kelamin'=> $sheetData[$i]['M'],
            'status_kawin'=> $sheetData[$i]['N'],
            'alamat_ktp'=> $sheetData[$i]['O'],
            'klinik'=> $sheetData[$i]['P'],
            'lokasi'=> $sheetData[$i]['Q'],
            'cj'=>  $sheetData[$i]['R'],

                ];
            }

        $insert_data = collect($answers);
//return $insert_data;
        $chunks = $insert_data->chunk(1000);

        foreach ($chunks as $chunk)
        {
            \DB::table('detail_peserta')->insert($chunk->toArray());
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
                'ip'=>$check->ip,
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
                         'ip'=>$check->ip,
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
   public function edit($id)
   {
    $data = DetailPeserta::find($id);
    return view('upload.edit',compact('data'));
   }
   public function list()
   {

    $data = DetailPeserta::all();
     return view('upload.list',compact('data'));
   }
   public function update_peserta(Request $request,$id)
   {
    $data = DetailPeserta::where('id',$id)->update([
        'nama'=>$request->nama,
        'nik'=>$request->nik
    ]);

    return redirect('list');
   }
   public function delete_peserta($id)
   {
      $data = DetailPeserta::find($id);
      if ($data) {
          $data->delete();
      }
      return redirect()->back();
   }
   public function create_new_peserta(Request $request)
   {
    $data = DetailPeserta::create([
        'nik'=>$request->nik,
        'status_dosis'=>$request->status_dosis,
        'nama'=>$request->nama,
        'tgl_reservasi'=>$request->tgl_reservasi,
        'slot'=>$request->slot,
        'note'=>$request->note,
        'email'=>$request->email,
        'hubungan_keluarga'=>$request->hubungan_keluarga,
        'status'=>$request->status,
        'nip'=>$request->nip,
        'no_hp'=>$request->no_hp,
        'tempat_lahir'=>$request->tempat_lahir,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat_ktp'=>$request->alamat_ktp,
        'status_kawin'=>$request->status_kawin,
        'klinik'=>$request->klinik,
        'lokasi'=>$request->lokasi,
        'cj'=>$request->cj,
        'ip'=>$request->ip
    ]);
return redirect('list');
   }
   public function create_new()
   {
    return view('upload.create');
   }

}
