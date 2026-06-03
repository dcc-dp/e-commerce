<?php

namespace App\Http\Controllers\admin\produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with(['kategori', 'umkm'])->latest()->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function detail($id)
    {
        $produk = Produk::with(['kategori', 'umkm', 'batch_foto.fotos'])->findOrFail($id);
        return view('admin.produk.detail', compact('produk'));
    }

    public function hapus($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return back()->with('success', 'Produk berhasil diturunkan secara permanen (delete).');
    }

    public function approve($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'approved';
        $produk->save();

        return back()->with('success', 'Produk berhasil disetujui dan tayang di publik.');
    }

    public function reject($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'rejected';
        $produk->save();

        return back()->with('success', 'Produk ditolak (takedown).');
    }
}
