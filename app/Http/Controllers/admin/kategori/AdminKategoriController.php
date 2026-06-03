<?php

namespace App\Http\Controllers\admin\kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function tambah()
    {
        return view('admin.kategori.tambah');
    }

    public function tambah_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin-kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function edit_proses(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin-kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        // Bisa tambahkan validasi untuk tidak menghapus kategori yang masih punya produk
        $kategori->delete();

        return redirect()->route('admin-kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
