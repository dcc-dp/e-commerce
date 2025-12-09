<?php

namespace App\Http\Controllers\user\singleproduct;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Ulasan;
use Auth;
use Illuminate\Http\Request;

class UserSingleproductController extends Controller
{
  public function index($id)
  {
    $produk = Produk::find($id);
    $rating1 = Ulasan::where('produk_id', $id)
      ->where('rating', '1')
      ->count();
    $rating2 = Ulasan::where('produk_id', $id)
      ->where('rating', '2')
      ->count();
    $rating3 = Ulasan::where('produk_id', $id)
      ->where('rating', '3')
      ->count();
    $rating4 = Ulasan::where('produk_id', $id)
      ->where('rating', '4')
      ->count();
    $rating5 = Ulasan::where('produk_id', $id)
      ->where('rating', '5')
      ->count();
    $rating = [$rating1, $rating2, $rating3, $rating4, $rating5];

    $dataulasan = Ulasan::where('produk_id', $id)->get();

    return view('user.pages.singleproduct', compact('produk', 'dataulasan', 'rating'));
  }

  public function ulasanStore(Request $request)
  {
    $request->validate(['produk_id', 'ulasan', 'rating']);
    $ulasan = Ulasan::where('user_id', auth()->user()->id)
      ->where('produk_id', $request->produk_id)
      ->first();

    if ($ulasan) {
      $ulasan->ulasan = $request->ulasan;
      $ulasan->rating = $request->rating;
      $ulasan->save();
    } else {
      Ulasan::create([
        'user_id' => auth()->user()->id,
        'produk_id' => $request->produk_id,
        'ulasan' => $request->ulasan,
        'rating' => $request->rating,
      ]);
    }

    return redirect()->route('userSingleproduct', $request->produk_id);
  }
}
