<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
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

             for ($i=2; $i <= $rows; $i++) {
            $answers[] = [
            'note'  => $sheetData[$i]['A'],
            'nik' =>$sheetData[$i]['B'],
            'nama'  => $sheetData[$i]['C'],
            'jenis_kelamin' => $sheetData[$i]['D'],
            'tanggal_lahir'  =>$sheetData[$i]['E'],
            'umur' => $sheetData[$i]['F'],
            'instansi' => $sheetData[$i]['G'],
            'jenis_pekerjaan'  => $sheetData[$i]['H'],
            'kode_kategori' => $sheetData[$i]['I'],
            'no_hp' => $sheetData[$i]['J'],
            'alamat_ktp'  => $sheetData[$i]['K'],
            'kode_pos'  => $sheetData[$i]['L'],
            'kabupaten' =>$sheetData[$i]['M'],
            'nip'  => $sheetData[$i]['N'],
            'ip' => $sheetData[$i]['O'],
            'status'  =>$sheetData[$i]['P'],
            'hubungan_kerja' => $sheetData[$i]['Q'],
            'email' => $sheetData[$i]['R'],
            'tempat_lahir'  => $sheetData[$i]['S'],
            'status_kawin' => $sheetData[$i]['T'],
            'faskes' => $sheetData[$i]['U'],
            'lokasi_vaksin'  => $sheetData[$i]['P'],
            'customer_journey'  => $sheetData[$i]['W'],
            'bagian'  => $sheetData[$i]['X'],
                ];
            }

        $insert_data = collect($answers);

        $chunks = $insert_data->chunk(1000);

        foreach ($chunks as $chunk)
        {
            \DB::table('peserta')->insert($chunk->toArray());
        }
        return "success";

    }

}
