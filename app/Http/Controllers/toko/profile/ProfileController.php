<?php
namespace App\Http\Controllers\toko\profile;
use App\Http\Controllers\Controller;
use App\Models\Batch_foto;
use App\Models\Detail_keranjang;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Umkm;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $data = Umkm::where('user_id', Auth::id())->first();
        $produkList = Produk::where('umkm_id', $data->id)->get();
        $produk = $produkList->count();
        $produkIds = $produkList->pluck('id');
        $banyaknyapenilaian = Ulasan::whereIn('produk_id', $produkIds)->count();
        $totalNilai = Ulasan::whereIn('produk_id', $produkIds)->sum('rating');
        $penilaian = $banyaknyapenilaian > 0 ? round($totalNilai / $banyaknyapenilaian, 1) : 0;

        $tglbergabung = $data->created_at->format('d-m-Y');

        return view('toko.profile.index', compact(
            'data', 'produk', 'penilaian', 'banyaknyapenilaian', 'tglbergabung'
        ));
    }

    public function alamat(){
        return view('toko.profile.alamat');
    }

    public function hapus(){
        $data = Umkm::where('user_id', Session::get('id_user'))->first();

        if (!$data) {
            return back()->with('error', 'Data UMKM tidak ditemukan');
        }

        $produkList = Produk::where('umkm_id', $data->id)->get();

        foreach ($produkList as $p) {
            $ulasanList = Ulasan::where('produk_id', $p->id)->get();
            foreach ($ulasanList as $ulasan) {
                if ($ulasan->batch_foto_id) {
                    Batch_foto::find($ulasan->batch_foto_id)?->delete();
                }
                $ulasan->delete();
            }

            Detail_keranjang::where('produk_id', $p->id)->delete();

            $p->delete();
        }

        $data->delete();
        Auth::logout();
        return redirect()->route('login');

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
