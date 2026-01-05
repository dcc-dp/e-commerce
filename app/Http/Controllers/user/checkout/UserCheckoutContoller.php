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
   
  

    return view('user.pages.checkout', compact('total','dataDetailKeranjang'));
  }
  public function prosesChechkout(Request $request)
  {
    $keranjang = Keranjang::where('user_id', Auth::id())->first();
    $produk = Produk::find($request->produk_id);

    //menyimpan data
    Detail_keranjang::create([
      'keranjang_id' => $keranjang->id,
      'produk_id' => $request->produk_id,
      'jumlah' => $request->jumlah,
      'total' => $produk->harga * $request->jumlah,
    ]);
    //menampilkan data
    $totalBayar = Detail_keranjang::where('keranjang_id', $keranjang->id)->sum('subtotal');

    $keranjang->total_harga = $totalBayar;
    $keranjang->save();
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
