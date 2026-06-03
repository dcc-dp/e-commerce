<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'metode',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function detailPemesanan(){
        return $this->hasMany('App\Models\DetailPemesanan','pemesanan_id','id');
    }
}
