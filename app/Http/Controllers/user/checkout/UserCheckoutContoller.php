<?php

namespace App\Http\Controllers\user\checkout;
use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Detail_keranjang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCheckoutContoller extends Controller
{
  public function index(Request $request)
  {
    $total = $request->total;
    $detailKeranjangIds = json_decode($request->produk_ids);
    $dataDetailKeranjang= Detail_keranjang::whereIn('id', $detailKeranjangIds)->get();
    
    $dataAlamat = Alamat::where('user_id', Auth::id())->get();
   
    return view('user.pages.checkout', compact('total','dataDetailKeranjang', 'dataAlamat'));
  }
  

  public function prosesChechkout(Request $request)
  {
    $request->validate([
        'alamat_id' => 'required',
        'total' => 'required',
        'detail_keranjang_ids' => 'required|array'
    ]);

    // Ambil keranjang terakhir user yang belum dicheckout
    $keranjang = Keranjang::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    
    // Buat data pesanan
    $pemesanan = \App\Models\Pemesanan::create([
        'user_id' => Auth::id(),
        'total' => $request->total,
        'metode' => $request->metode ?? 'Transfer Bank',
        'status' => 'pending',
    ]);

    // Buat data pengiriman
    \App\Models\Pengiriman::create([
        'pemesanan_id' => $pemesanan->id,
        'alamat_id' => $request->alamat_id,
        'status' => 'pending'
    ]);

    // Pindahkan item keranjang ke detail_pemesanans
    $details = Detail_keranjang::whereIn('id', $request->detail_keranjang_ids)->get();
    foreach($details as $detail) {
        \App\Models\DetailPemesanan::create([
            'pemesanan_id' => $pemesanan->id,
            'produk_id' => $detail->produk_id,
            'jumlah' => $detail->jumlah,
            'total' => $detail->total,
        ]);
        // Hapus barang yang dibeli dari keranjang
        $detail->delete();
    }

    return redirect()->route('userConfirmation', ['id' => $pemesanan->id])->with('success', 'Pesanan berhasil dibuat!');
  }

  public function input_data(Request $request)
  {
    $keranjang = Keranjang::where('user_id', Auth::id())->first();
    $alamat = Alamat::create([
      'provinsi_id' => $request->provinsi_id,
      'kota_id' => $request->kota_id,
      'kecamatan_id' => $request->kecamatan_id,
      'pos_id' => $request->pos_id,
      'detail' => $request->detail,
      'note' => $request->note,
    ]);

    return redirect()->route('userCategory');
  }
  

}