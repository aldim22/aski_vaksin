<?php

namespace App\Exports;

use App\Models\DetailPeserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class peserta5Exports implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = DetailPeserta::select('nik','nama', 'tgl_lahir', 'status_dosis', 'tgl_reservasi', 'slot', 'note')->where('status_regist', '=', '0')->get();
        $collection->map(function ($item, $key) {
            $item->nik = "'" . $item->nik;
            return $item;
        });
        return $collection;
    }

    public function headings(): array
    {
        return ["NIK", "Nama", "Tanggal Lahir", "Status Dosis", "Reservasi", "Slot", "Note"];
    }
}