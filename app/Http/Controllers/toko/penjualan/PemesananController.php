<?php

namespace App\Http\Controllers\toko\penjualan;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Detail_keranjang;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
       public function pemesanan (){
      $pemesanan = Pemesanan::all();
        return view('toko.kelola_produk.pemesanan', compact('pemesanan'));
    }   

     public function detail ($id){
      $pemesanan = Pemesanan::find($id);
      $detail = Detail_keranjang::where('keranjang_id',$pemesanan->id)->get();
        return view('toko.kelola_produk.detail' , compact('detail'));
    }

    public function edit ($id){
      $pemesanan = Pemesanan::find($id);
      return view('toko.kelola_produk.edit',compact('pemesanan'));
    }
    
    public function edit_proses (Request $request){
        

          Pemesanan::where('id',$request->id)->update([ 
           'status'=>$request->status,
          ]);

    return redirect('/toko/pemesanan');

}
}