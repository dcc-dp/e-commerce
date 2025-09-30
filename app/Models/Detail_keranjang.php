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
    public function produk(){
        return $this->belongsTo('App\Models\Produk','produk_id','id');
    }
     public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
