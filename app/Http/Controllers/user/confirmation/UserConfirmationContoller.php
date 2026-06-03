<?php

namespace App\Http\Controllers\user\confirmation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Umkm;
use App\Models\Pengiriman;

class UserConfirmationContoller extends Controller
{
    public function index($id)
    {
        $pemesanan = Pemesanan::with('user')->findOrFail($id);
        $pengiriman = Pengiriman::with('alamat')->where('pemesanan_id', $id)->first();
        $detailPemesanan = DetailPemesanan::with('produk')->where('pemesanan_id', $id)->get();
        
        $nomorhp = '';
        if ($detailPemesanan->isNotEmpty() && $detailPemesanan->first()->produk) {
            $umkm = Umkm::find($detailPemesanan->first()->produk->umkm_id);
            if ($umkm && $umkm->nomorhp) {
                $nomorhp = $umkm->nomorhp;
                if (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '62' . substr($nomorhp, 1);
                }
            }
        }

        return view('user.pages.confirmation', compact('pemesanan', 'pengiriman', 'detailPemesanan', 'nomorhp'));
    }
}
