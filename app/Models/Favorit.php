<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
    ];

    public function produk(){
        return $this->belongsTo('App\Models\Produk','produk_id','id');
    }
}
