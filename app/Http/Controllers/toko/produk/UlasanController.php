<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function ulasan(){
      $ulasan = Ulasan::all();
      // dd($ulasan);
      return view('toko.kelola_produk.ulasan.index', compact('ulasan'));
    }
}
