<?php

namespace App\Http\Controllers\toko\penjualan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{

       public function penjualan (){
        $penjualan = Pemesanan::where('status','selesai')->get();
        return view('toko.kelola_produk.penjualan', compact('penjualan'));
    }

    
   
}
