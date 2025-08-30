<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
class ProdukController extends Controller
{
    public function produk (){
    //      $produk = DB::table('produk')->get();
        $produk = Produk::get();
        return view('toko.produk.index', compact('produk'));
       
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
    //kelola penjualan
     public function pemesanan (){
        return view('toko.produk.pemesanan');
    }
     public function penjualan (){
        return view('toko.produk.penjualan');
    }
    //kelola pemasukkan
      public function pemasukan(){
        return view('toko.produk.pemasukan');
    }
    
}
