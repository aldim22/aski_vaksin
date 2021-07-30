<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class peserta0Exports implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peserta::select('nik','name', 'jenis_kelamin', 'instansi', 'waktu_vaksin', 'tanggal_vaksin', 'tanggal_regist')->where('status_regist', '0')->get();
    }

    public function headings(): array
    {
        return ["NIK", "Nama", "Jenis Kelamin", "Instansi", "Tanggal Vaksin", "Waktu Vaksin", "Tanggal Registrasi"];
    }
}