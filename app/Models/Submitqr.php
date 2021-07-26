<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;
class Submitqr extends Model
{
    protected $table = "submit_qr";

    protected $primaryKey = "id";
    protected $fillable = [
      'nik',
      'qr'
    ];

}
