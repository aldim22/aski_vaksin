<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class peserta1Exports implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = Peserta::select('nik','name', 'jenis_kelamin', 'instansi', 'waktu_vaksin', 'tanggal_vaksin', 'tanggal_regist_2')->where([['status_regist', '=', '1'], ['status_regist_2', '=', '1']])->whereDate('tanggal_regist_2', '=', '08-22-2021')->get();
        $collection->map(function ($item, $key) {
            $item->nik = "'" . $item->nik;
            return $item;
        });
        return $collection;
    }

    public function headings(): array
    {
        return ["NIK", "Nama", "Jenis Kelamin", "Instansi", "Tanggal Vaksin", "Waktu Vaksin", "Tanggal Registrasi"];
    }
}