<?php

namespace App\Http\Controllers\user\alamat;
use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserAlamatController extends Controller
{
    public function index(){
      $dataAlamat=Alamat::where('user_id',Auth::id())->get();
        return view('user.pages.alamat.index',compact('dataAlamat'));
    }

    // public function tambah(){
    //     return view('user.pages.alamat.tambah');
    // }


    public function tambah(){
    return view('user.pages.alamat.tambah');
}
   public function tambah_proses (Request $request){
    $request->validate([
      'provinsi_id' => 'required',
      'kota_id' => 'required',
      'kecamatan_id' => 'required',
      'pos_id' =>'required',
      'kode_pos'=>'required',
      'catatan'=>'required',

    ]);

    // Ambil nama dari API
    $provinsiResponse = Http::get("https://wilayah.id/api/provinces.json");
    $provinsiData = collect($provinsiResponse->json()['data'])->firstWhere('code', $request->provinsi_id);

    $kotaResponse = Http::get("https://wilayah.id/api/regencies/{$request->provinsi_id}.json");
    $kotaData = collect($kotaResponse->json()['data'])->firstWhere('code', $request->kota_id);

    $kecamatanResponse = Http::get("https://wilayah.id/api/districts/{$request->kota_id}.json");
    $kecamatanData = collect($kecamatanResponse->json()['data'])->firstWhere('code', $request->kecamatan_id);

    $kelurahanResponse = Http::get("https://wilayah.id/api/villages/{$request->kecamatan_id}.json");
    $kelurahanData = collect($kelurahanResponse->json()['data'])->firstWhere('code', $request->pos_id);

      Alamat::create([
        'user_id' =>Auth::id(),
        'provinsi_nama' => $provinsiData['name'] ?? '',
        'kota_nama' => $kotaData['name'] ?? '',
        'kecamatan_nama' => $kecamatanData['name'] ?? '',
        'kelurahan_nama' => $kelurahanData['name'] ?? '',
        'kode_pos'=>$request->kode_pos,
        'catatan'=>$request->catatan,
      ]);
      
      Return redirect('alamat');
    }

      public function edit($id){
    $alamat = Alamat::find($id);
    return view('user.pages.alamat.edit',compact('alamat'));
  }

   public function edit_proses(Request $request){
    Alamat::where('id',$request->id)->update([
        'user_id' => Auth::id(),
        'provinsi_id' =>$request->provinsi_id,
        'kota_id' =>$request->kota_id,
        'kecamatan_id' =>$request->kecamatan_id,
        'pos_id'=>$request->pos_id,
        'detail'=>$request->detail,
        'note'=>$request->note,
    ]);

    return redirect('alamat');
  }

  public function delete($id){
  Alamat::find($id)->delete();
  return redirect('alamat');
}

public function getKota($id)
{
    $response = Http::get("https://wilayah.id/api/regencies/$id.json");

    return response()->json($response->json());
}

public function getKecamatan($id)
{
    $response = Http::get("https://wilayah.id/api/districts/$id.json");

    return response()->json($response->json());
}

public function getKelurahan($id)
{
    $response = Http::get("https://wilayah.id/api/villages/$id.json");

    return response()->json($response->json());
}
}
