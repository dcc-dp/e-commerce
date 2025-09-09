<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'ulasan',
        'rating',
        'batch_foto_id',
    ];
    public function userr(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
        public function produk(){
        return $this->belongsTo('App\Models\Produk','produk_id','id');
    }
}
