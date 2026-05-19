<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
