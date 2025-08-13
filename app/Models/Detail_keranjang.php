<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_keranjang extends Model
{
    protected $fillable = [
        'keranjang_id',
        'produk_id',
        'jumlah',
        'total',
    ];
}
