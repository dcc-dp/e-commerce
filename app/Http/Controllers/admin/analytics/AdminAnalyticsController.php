<?php

namespace App\Http\Controllers\admin\analytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Produk;

class AdminAnalyticsController extends Controller
{
    public function index()
    {
        $totalPembeli = User::where('role', 'user')->count();
        $totalPenjual = User::where('role', 'penjual')->count();
        $totalProduk = Produk::count();
        $totalTransaksi = Pemesanan::count();
        
        // Asumsi pendapatan kotor adalah total bayar dari pesanan yang selesai
        $pendapatanKotor = Pemesanan::where('status', 'selesai')->sum('total');

        return view('admin.analytics.index', compact(
            'totalPembeli', 
            'totalPenjual', 
            'totalProduk', 
            'totalTransaksi', 
            'pendapatanKotor'
        ));
    }
}
