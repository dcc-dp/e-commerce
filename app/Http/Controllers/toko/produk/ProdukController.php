<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use App\Models\Batch_foto;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Umkm;
class ProdukController extends Controller
{
    public function produk (){
    //      $produk = DB::table('produk')->get();
        $produk = Produk::get();
        return view('toko.kelola_produk.produk.index', compact('produk'));
       
    }
    public function tambah ()
    {
      
        return view('toko.kelola_produk.produk.tambah');
    }
    public function tambah_proses (Request $request){
        $batch=Batch_foto::create([
            'nama'=>$request->nama.'-'.uniqid()
        ]);
          Produk::create([ 
            'umkm_id'=>1,
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,   
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'berat'=>$request->berat,
            'satuan'=>$request->satuan,
            'kategori_id'=>$request->kategori,
            'batch_foto_id'=>$batch->id,
          ]);

        return redirect('/toko/produk');
        
    }

    public function edit($id)  {
         $produk = Produk::find($id);
        return view('toko.kelola_produk.produk.edit',compact('produk'));
       
    }

        public function edit_proses (Request $request){
        

          Produk::where('id',$request->id)->update([ 
           
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,   
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'berat'=>$request->berat,
            'satuan'=>$request->satuan,
            'kategori_id'=>$request->kategori,
            
          ]);

        return redirect('/toko/produk');
        
    }
     public function delate ($id)
    {
       $produk = Produk::find($id);
        $batch = Batch_foto::find($produk->batch_foto_id);
        $batch->delete();
        $produk->delete();
        return redirect('/toko/produk');
    }

    // public function tambah_ulasan(){
    //   return view('toko.kelola_produk.ulasan.tambah');
    // }

    // public function tambah_ulasan_proses(Request $request){
    //   Ulasan::create([
    //     'produk_id'=>$request->nama,
    //     'ulasan'=>$request->ulasan,
    //     'rating'=>$request->rating,
    //   ]);

    //   return redirect('toko/ulasan');
    // }
    

}
