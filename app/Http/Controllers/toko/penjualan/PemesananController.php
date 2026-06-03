<?php

namespace App\Http\Controllers\toko\penjualan;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function pemesanan (){
        $umkm = Umkm::where('user_id', Auth::id())->first();
        if(!$umkm) return redirect()->back();

        $pemesanan = Pemesanan::whereHas('detailPemesanan.produk', function($query) use ($umkm) {
            $query->where('umkm_id', $umkm->id);
        })->orderBy('id', 'desc')->get();

        return view('toko.kelola_produk.pemesanan', compact('pemesanan'));
    }   

    public function detail ($id){
        $umkm = Umkm::where('user_id', Auth::id())->first();
        if(!$umkm) return redirect()->back();

        $pemesanan = Pemesanan::where('id', $id)->whereHas('detailPemesanan.produk', function($query) use ($umkm) {
            $query->where('umkm_id', $umkm->id);
        })->firstOrFail();

        $detail = DetailPemesanan::with('produk')->where('pemesanan_id', $pemesanan->id)
            ->whereHas('produk', function($query) use ($umkm) {
                $query->where('umkm_id', $umkm->id);
            })->get();
            
        return view('toko.kelola_produk.detail' , compact('detail'));
    }

    public function edit ($id){
        $umkm = Umkm::where('user_id', Auth::id())->first();
        if(!$umkm) return redirect()->back();

        $pemesanan = Pemesanan::where('id', $id)->whereHas('detailPemesanan.produk', function($query) use ($umkm) {
            $query->where('umkm_id', $umkm->id);
        })->firstOrFail();

        return view('toko.kelola_produk.edit',compact('pemesanan'));
    }
    
    public function edit_proses (Request $request){
        $umkm = Umkm::where('user_id', Auth::id())->first();
        if(!$umkm) return redirect()->back();

        $pemesanan = Pemesanan::where('id', $request->id)->whereHas('detailPemesanan.produk', function($query) use ($umkm) {
            $query->where('umkm_id', $umkm->id);
        })->firstOrFail();

        $pemesanan->update([ 
            'status'=>$request->status,
        ]);

        return redirect('/toko/pemesanan');
    }
}