<?php

namespace App\Http\Controllers\user\tracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\DetailPemesanan;
use Illuminate\Support\Facades\Auth;

class UserTrackingController extends Controller
{
    public function index($id){
        $pemesanan = Pemesanan::with('user')->where('user_id', Auth::id())->findOrFail($id);
        $pengiriman = Pengiriman::with('alamat')->where('pemesanan_id', $id)->first();
        $detailPemesanan = DetailPemesanan::with(['produk.umkm'])->where('pemesanan_id', $id)->get();
        
        return view('user.pages.tracking', compact('pemesanan', 'pengiriman', 'detailPemesanan'));
    }
}
