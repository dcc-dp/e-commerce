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
}
