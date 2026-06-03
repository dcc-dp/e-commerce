<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch_foto extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'batch_foto_id');
    }
}
