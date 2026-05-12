<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = [
        'user_id',
        'provinsi_nama',
        'kota_nama',
        'kecamatan_nama',
        'kelurahan_nama',
        'kode_pos',
        'catatan',
        
    ];
}
