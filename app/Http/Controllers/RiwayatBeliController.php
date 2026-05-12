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
        $keranjang_id=Keranjang::where('user_id', Auth::id())->first()->id;
        $pemesanan=Pemesanan::where('keranjang_id', $keranjang_id);
        $detailkeranjang=Detail_keranjang::where('keranjang_id', $keranjang_id)->get();
        $total=Detail_keranjang::where('keranjang_id', $keranjang_id)->get()->sum('total');
        return view('user.pages.riwayatbeli', compact('detailkeranjang', 'total')); 
    }
}
