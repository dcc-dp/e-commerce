<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'umkm_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'berat',
        'satuan',
        'kategori_id',
        'batch_foto_id',
        'rating',
        'pembelian',
    ];
    
    public function kategori(){
        return $this->belongsTo('App\Models\Kategori','kategori_id','id');
    }
    
}
