<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimans';

    protected $fillable = [
        'pemesanan_id',
        'alamat_id',
        'status',
    ];

    public function alamat(){
        return $this->belongsTo('App\Models\Alamat','alamat_id','id');
    }
}
