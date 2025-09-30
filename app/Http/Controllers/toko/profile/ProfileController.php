<?php
namespace App\Http\Controllers\toko\profile;
use App\Http\Controllers\Controller;
use App\Models\Detail_keranjang;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Umkm;
use Illuminate\Support\Facades\Session as fila;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $data= Umkm::where('user_id', fila::get('id_user'))->first();
        $produk = Produk::where('umkm_id', $data->id)->get()->count();
        $dataproduk = Produk::where('umkm_id', $data->id)->get();
        $jumpenilaian=Ulasan::where('produk_id', '5')->get()->sum('rating');
        $banyaknyapenilaian=Ulasan::where('produk_id', '5')->get()->count();
        $tglbergabung=$data->created_at->format('d-m-Y');
        $penilaian=$jumpenilaian/$banyaknyapenilaian;

        return view('toko.profile.index', compact('data','produk', 'penilaian',  'banyaknyapenilaian', 'tglbergabung'));
    }
    public function alamat(){
        return view('toko.profile.alamat');
    }

    public function hapus(){
        $data= Umkm::where('user_id', fila::get('id_user'))->first();
        $produk= Produk::where('umkm_id',$data->id)->get();
        foreach($produk as $p){
            Ulasan::where('produk_id',$p->id)->delete();
            Detail_keranjang::where('produk_id',$p->id)->delete();
        }
        Produk::where('umkm_id',$data->id)->delete();
        Umkm::where('user_id', fila::get('id_user'))->delete();
        fila::put('cek', false);
        return redirect()->route('login');
        
    }
}
