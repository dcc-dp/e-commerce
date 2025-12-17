<?php

namespace App\Http\Controllers\tokoPenjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class TokoPenjualController extends Controller
{
     public function index($idtoko){
     $dataProduk=Produk::where('umkm_id', $idtoko)->get();
     $toko = Umkm::findOrFail($idtoko);

   $produkids = Produk::where('umkm_id', $idtoko)->pluck('id')->toArray();

   $penilaian = Ulasan::whereIn('produk_id', $produkids)->avg('rating');

   $jumlahproduk = Produk::where('umkm_id', $idtoko)->count();


     $datatoko = [
      'idtoko'=>$toko->id,
      'namatoko'=>$toko->nama,
      'penilaian'=>$penilaian,
      'jumlahproduk'=>$jumlahproduk
    ];
        return view('user.pages.tokopenjual', compact( 'dataProduk', 'datatoko', 'toko'));
     }

      public function search(Request $request)
  {
   $toko = Umkm::findOrFail($request->idtoko);

   $produkids = Produk::where('umkm_id', $request->idtoko)->pluck('id')->toArray();

   $penilaian = Ulasan::whereIn('produk_id', $produkids)->avg('rating');

   $jumlahproduk = Produk::where('umkm_id', $request->idtoko)->count();


     $datatoko = [
      'idtoko'=>$toko->id,
      'namatoko'=>$toko->nama,
      'penilaian'=>$penilaian,
      'jumlahproduk'=>$jumlahproduk
    ];

    $dataProduk = Produk::when($request->search, function ($q) use ($request) {
      $q->where('nama', 'like', "%{$request->search}%");
    })->where('umkm_id', $toko->id)->get();

    return view('user.pages.tokopenjual', compact('dataProduk','datatoko', 'toko'));
  }
}
