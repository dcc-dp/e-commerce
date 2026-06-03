<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'batch_foto_id',
        'foto'
    ];

    public function batch_foto()
    {
        return $this->belongsTo(Batch_foto::class, 'batch_foto_id');
    }
}
