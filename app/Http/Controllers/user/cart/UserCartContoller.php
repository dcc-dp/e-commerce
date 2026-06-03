<?php

namespace App\Http\Controllers\user\cart;
use App\Http\Controllers\Controller;
use App\Models\Detail_keranjang;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartContoller extends Controller
{
  public function index()
  {
    $keranjang = Keranjang::where('user_id', Auth::id())->first();

    if (!$keranjang) {
      return view('user.pages.cart', ['groupedCart' => []]);
    }

    $dataKeranjang = Detail_keranjang::with(['produk.umkm', 'produk.batch_foto.fotos'])
      ->where('keranjang_id', $keranjang->id)
      ->get();

    $groupedCart = $dataKeranjang->groupBy(function ($item) {
      return $item->produk->umkm->nama;
    });

    return view('user.pages.cart', compact('groupedCart'));
  }

  public function prosesTambah(Request $request)
  {
    $keranjang = Keranjang::where('user_id', Auth::id())->first();
    $produk = Produk::find($request->produk_id);

    $detail_keranjang = Detail_keranjang::where('keranjang_id', $keranjang->id)
      ->where('produk_id', $produk->id)
      ->first();

    if ($detail_keranjang) {
      // Validate Stock
      if ($detail_keranjang->jumlah + $request->jumlah > $produk->stok) {
          return redirect()->back()->with('error', 'Stok tidak mencukupi. Sisa stok: ' . $produk->stok);
      }

      $detail_keranjang->jumlah = $detail_keranjang->jumlah + $request->jumlah;
      $detail_keranjang->total = $detail_keranjang->total + ($produk->harga * $request->jumlah);
      $detail_keranjang->save();
    } else {
      // Validate Stock
      if ($request->jumlah > $produk->stok) {
          return redirect()->back()->with('error', 'Stok tidak mencukupi. Sisa stok: ' . $produk->stok);
      }

      Detail_keranjang::create([
        'keranjang_id' => $keranjang->id,
        'produk_id' => $request->produk_id,
        'jumlah' => $request->jumlah,
        'total' => $produk->harga * $request->jumlah,
      ]);
    }

    $totalBayar = Detail_keranjang::where('keranjang_id', $keranjang->id)->sum('total');
    $keranjang->total = $totalBayar;
    $keranjang->save();

    return redirect()->route('userCart')->with('success', 'Berhasil ditambahkan ke keranjang');
  }

  // public function prosesTambah(Request $request)
  // {
  //   $produk = Produk::findOrFail($request->produk_id);

  //   $keranjang = Keranjang::firstOrCreate(['user_id' => Auth::id()], ['total_harga' => 0]);

  //   $detail = Detail_keranjang::where('keranjang_id', $keranjang->id)
  //     ->where('produk_id', $produk->id)
  //     ->first();

  //   if ($detail) {
  //     $detail->jumlah += $request->jumlah;
  //     $detail->subtotal = $detail->jumlah * $produk->harga;
  //     $detail->save();
  //   } else {
  //     Detail_keranjang::create([
  //       'keranjang_id' => $keranjang->id,
  //       'produk_id' => $produk->id,
  //       'harga' => $produk->harga,
  //       'jumlah' => $request->jumlah,
  //       'subtotal' => $produk->harga * $request->jumlah,
  //     ]);
  //   }

  //   $keranjang->total_harga = Detail_keranjang::where('keranjang_id', $keranjang->id)->sum('subtotal');
  //   $keranjang->save();

  //   return redirect()->route('userCart', compact('keranjang'));
  // }
}
