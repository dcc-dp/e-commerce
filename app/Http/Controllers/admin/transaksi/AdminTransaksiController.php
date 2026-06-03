<?php

namespace App\Http\Controllers\admin\transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        // Hapus relasi 'pengiriman' yang tidak ada dan ganti total_bayar menjadi total
        $transaksi = Pemesanan::with(['user', 'detailPemesanan.produk.umkm'])->orderBy('id', 'desc')->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }
}
