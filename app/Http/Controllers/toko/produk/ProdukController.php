<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProdukController extends Controller
{
    public function produk (){
        return view('toko.produk.index');
    }
    public function tambah (){
        return view('toko.produk.tambah');
    }
    public function tambah_proses (){
        return redirect()->route('toko-produk');
    }
     public function ulasan (){
        return view('toko.produk.ulasan');
    }
}
