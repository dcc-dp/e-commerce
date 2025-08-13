<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'keranjang_id',
        'total',
        'metode',
        'status',
    ];
}
