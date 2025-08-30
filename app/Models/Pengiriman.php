<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $fillable = [
        'pemesanan_id',
        'alamat_id',
        'status',
    ];
}
