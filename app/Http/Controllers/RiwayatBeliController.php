<?php

namespace App\Http\Controllers;

use App\Models\Detail_keranjang;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatBeliController extends Controller
{
    public function index(){
        $riwayat = Pemesanan::with(['detailPemesanan.produk.umkm'])
                    ->where('user_id', Auth::id())
                    ->orderBy('id', 'desc')
                    ->get();
                    
        return view('user.pages.riwayatbeli', compact('riwayat')); 
    }
}
