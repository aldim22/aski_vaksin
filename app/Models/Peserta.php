<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;
class Peserta extends Model
{
    protected $table = "peserta";

    protected $primaryKey = "id";
    protected $fillable = [
      'nik',
      'nama',
      'jenis_kelamin',
      'tanggal_lahir',
      'umur',
      'instansi',
      'jenis_pekerjaan',
      'kode_kategori',
      'no_hp',
      'alamat_ktp',
      'kode_pos',
      'kabupaten',
      'ip',
      'status',
      'hubungan_keluarga',
      'email',
      'tempat_lahir',
      'faskes',
      'lokasi_vaksin',
      'customer_journey',
      'bagian',
      'note'
    ];

}
