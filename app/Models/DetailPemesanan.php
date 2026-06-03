<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $fillable = [
        'pemesanan_id',
        'produk_id',
        'jumlah',
        'total',
    ];

    public function pemesanan(){
        return $this->belongsTo('App\Models\Pemesanan','pemesanan_id','id');
    }

    public function produk(){
        return $this->belongsTo('App\Models\Produk','produk_id','id');
    }
}
