<?php

namespace App\Http\Controllers\user\cart;
use App\Http\Controllers\Controller;
use App\Models\Detail_keranjang;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartContoller extends Controller
{
  public function index()
  {
    $keranjang = Keranjang::where('user_id', Auth::id() ?? '')->first();
    $dataKeranjang = Detail_keranjang::where('Keranjang_id', $keranjang->id ?? '')->get();

    return view('user.pages.cart', compact('dataKeranjang'));
  }

  public function prosesTambah(Request $request)
  {
    $keranjang = Keranjang::where('user_id', Auth::id())->first();
    $produk = Produk::find($request->produk_id);
    $isAda = Detail_keranjang::where('keranjang_id', $keranjang->id)
      ->where('produk_id', $produk->id)
      ->exists();

    if ($isAda) {
      $detail_keranjang = Detail_keranjang::where('keranjang_id', $keranjang->id)->first();
      $detail_keranjang->jumlah = $detail_keranjang->jumlah + $request->jumlah;
      $detail_keranjang->total = $detail_keranjang->total + $produk->harga * $request->jumlah;
      $detail_keranjang->save();
    } else {
      Detail_keranjang::create([
        'keranjang_id' => $keranjang->id,
        'produk_id' => $request->produk_id,
        'jumlah' => $request->jumlah,
        'total' => $produk->harga * $request->jumlah,
      ]);
    }

    return redirect()->route('userCart');
  }
}
