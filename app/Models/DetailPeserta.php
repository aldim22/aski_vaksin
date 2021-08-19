<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;
class DetailPeserta extends Model
{
    protected $table = "detail_peserta";

    protected $primaryKey = "id";
    protected $fillable = [
      'nik',
      'nama',
      'status_dosis',
      'tgl_reservasi',
      'slot',
      'note',
      'email',
      'tgl_regist',
    ];

}
