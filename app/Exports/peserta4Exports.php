<?php

namespace App\Exports;

use App\DetailPeserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class peserta4Exports implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = DetailPeserta::select('nik','nama', 'status_dosis', 'tgl_reservasi', 'slot', 'note', 'tgl_regist')->where([['status_dosis', '=', 'Dosis 2'], ['status_regist', '=', '2']])->whereDate('tgl_regist', '=', '08-21-2021')->get();
        $collection->map(function ($item, $key) {
            $item->nik = "'" . $item->nik;
            return $item;
        });
        return $collection;
    }

    public function headings(): array
    {
        return ["NIK", "Nama", "Status Dosis", "Reservasi", "Slot", "Note", "Tanggal Registrasi"];
    }
}