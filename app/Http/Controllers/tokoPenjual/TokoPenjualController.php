<?php

 namespace App\Http\Controllers\tokoPenjual;

  use App\Http\Controllers\Controller;
  use App\Models\Produk;
  use App\Models\Ulasan;
  use App\Models\Umkm;
  use Illuminate\Http\Request;

  class TokoPenjualController extends Controller
  {
      public function index($idtoko){
      $dataProduk=Produk::where('umkm_id', $idtoko)->get();
      $toko = Umkm::findOrFail($idtoko);

    // $produk = Produk::find($id); 
    
    // $produkByKategori = Produk::where('kategori_id', $produk->kategori_id)->get();

    //   $rating1 = Ulasan::where('produk_id', $id)
    //   ->where('rating', '1')
    //   ->count();
    // $rating2 = Ulasan::where('produk_id', $id)
    //   ->where('rating', '2')
    //   ->count();
    // $rating3 = Ulasan::where('produk_id', $id)
    //   ->where('rating', '3')
    //   ->count();
    // $rating4 = Ulasan::where('produk_id', $id)
    //   ->where('rating', '4')
    //   ->count();
    // $rating5 = Ulasan::where('produk_id', $id)
    //   ->where('rating', '5')
    //   ->count();
    // $rating = [$rating1, $rating2, $rating3, $rating4, $rating5];

    $produkids = Produk::where('umkm_id', $idtoko)->pluck('id')->toArray();

    $dataulasan = Ulasan::whereIn('produk_id', $produkids)->get();

    $penilaian = Ulasan::whereIn('produk_id', $produkids)->avg('rating');

    $jumlahproduk = Produk::where('umkm_id', $idtoko)->count();


      $datatoko = [
        'idtoko'=>$toko->id,
        'namatoko'=>$toko->nama,
        'penilaian'=>$penilaian,
        'jumlahproduk'=>$jumlahproduk
      ];
      return view('user.pages.tokopenjual', compact( 'dataProduk', 'datatoko', 'toko', 'dataulasan'));
      }

      public function search(Request $request)
{
    $toko = Umkm::findOrFail($request->idtoko);

     if (!$request->filled('search')) {
        return redirect()->route('tokoPenjual', $toko->id);
    }

    $produkids = Produk::where('umkm_id', (string) $toko->id)->pluck('id');

    $datatoko = [
        'idtoko' => $toko->id,
        'namatoko' => $toko->nama,
        'penilaian' => Ulasan::whereIn('produk_id', $produkids)->avg('rating'),
        'jumlahproduk' => $produkids->count()
    ];

    $dataProduk = Produk::where('umkm_id', (string) $toko->id)
        ->where('nama', 'LIKE', '%' . trim($request->search) . '%')
        ->get();

    return view('user.pages.tokopenjual', compact('dataProduk', 'datatoko', 'toko'));
}

  }
