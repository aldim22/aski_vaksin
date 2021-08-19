<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class peserta0Exports implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = Peserta::select('nik','name', 'jenis_kelamin', 'instansi', 'waktu_vaksin', 'tanggal_vaksin')->where('status_regist', '0')->get();
        $collection->map(function ($item, $key) {
            $item->nik = "'" . $item->nik;
            return $item;
        });
        return $collection;
    }

    public function headings(): array
    {
        return ["NIK", "Nama", "Jenis Kelamin", "Instansi", "Tanggal Vaksin", "Waktu Vaksin"];
    }
}