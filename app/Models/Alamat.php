<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = [
        'user_id',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'pos_id',
        'detail',
        'note',
    ];
}
