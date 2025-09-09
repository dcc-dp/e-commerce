<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function ulasan()
    {
      
        return view('toko.kelola_produk.produk.tambah');
    }
}
