<?php

namespace App\Http\Controllers\toko\produk;
use App\Http\Controllers\Controller;
use App\Models\Batch_foto;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Umkm;
class ProdukController extends Controller
{
    public function produk (){
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');
        
        $produk = Produk::where('umkm_id', $umkm->id)->get();
        return view('toko.kelola_produk.produk.index', compact('produk'));
    }

    public function tambah ()
    {
        $dataKategori = Kategori::all();
        return view('toko.kelola_produk.produk.tambah', compact('dataKategori'));
    }

    public function tambah_proses (Request $request){
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');

        $batch=Batch_foto::create([
            'nama'=>$request->nama.'-'.uniqid()
        ]);
        
        Produk::create([ 
            'umkm_id'=>$umkm->id,
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
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');

        $dataKategori = Kategori::all();
        $produk = Produk::where('id', $id)->where('umkm_id', $umkm->id)->firstOrFail();
        return view('toko.kelola_produk.produk.edit',compact('produk', 'dataKategori'));
    }

    public function edit_proses (Request $request){
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');

        $produk = Produk::where('id', $request->id)->where('umkm_id', $umkm->id)->firstOrFail();
        
        $produk->update([ 
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
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');

        $produk = Produk::where('id', $id)->where('umkm_id', $umkm->id)->firstOrFail();
        
        if ($produk->batch_foto_id) {
            $batch = Batch_foto::find($produk->batch_foto_id);
            if ($batch) {
                // Delete actual files here if needed
                $batch->delete();
            }
        }
        
        $produk->delete();
        return redirect('/toko/produk');
    }

    public function gambar($id)
    {
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if(!$umkm) return redirect()->back()->with('error', 'Toko tidak ditemukan.');

        $produk = Produk::where('id', $id)->where('umkm_id', $umkm->id)->with('batch_foto.fotos')->firstOrFail();
        return view('toko.kelola_produk.produk.gambar', compact('produk'));
    }

    public function gambar_upload(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        $produk = Produk::where('id', $request->produk_id)->where('umkm_id', $umkm->id)->firstOrFail();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Pindahkan ke public/assets/img/user/product (atau storage)
            $file->move(public_path('assets/img/user/product'), $filename);

            \App\Models\Foto::create([
                'batch_foto_id' => $produk->batch_foto_id,
                'foto' => $filename
            ]);
        }

        return back()->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function gambar_hapus($id)
    {
        $foto = \App\Models\Foto::findOrFail($id);
        
        // Verifikasi kepemilikan
        $umkm = Umkm::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        $batchId = $foto->batch_foto_id;
        $produk = Produk::where('batch_foto_id', $batchId)->where('umkm_id', $umkm->id)->first();

        if($produk) {
            // Hapus file fisik jika diperlukan
            $imagePath = public_path('assets/img/user/product/'.$foto->foto);
            if(file_exists($imagePath)) {
                @unlink($imagePath);
            }
            $foto->delete();
            return back()->with('success', 'Gambar berhasil dihapus!');
        }

        return back()->with('error', 'Tidak ada akses untuk menghapus gambar ini.');
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
