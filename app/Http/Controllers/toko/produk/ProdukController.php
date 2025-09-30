<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
class ProdukController extends Controller
{
    public function produk (){
        return view('toko.produk.index');
    }
    public function tambah (){
        return view('toko.produk.tambah');
    }
    public function tambah_proses (){
        return redirect()->route('toko-produk');
    }
     public function ulasan (){
        return view('toko.produk.ulasan');
    }
     public function update_profile (Request $request){
        // dd ($request->all());
        $bacobeleng=($request->all());
        Umkm::where('id', $bacobeleng['id'])->update([
            'nama'=>$bacobeleng['nama'],
            'alamat'=>$bacobeleng['alamat'],
            'deskripsi'=>$bacobeleng['deskripsi'],
        ]);
       return redirect()->route('toko-deskripsi');
    }
}
