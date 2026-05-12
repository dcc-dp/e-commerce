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
     
      // dd($request->all());

    $request->validate([
      'provinsi_id' => 'required',
      'kota_id' => 'required',
      'kecamatan_id' => 'required',
      'pos_id' =>'required',
      'detail' =>'required',
      'note'=>'required',
    ]);

  
    Alamat::create([
        'user_id' => auth()->id(),
        'provinsi_id' => $request->provinsi_id,
        'kota_id' => $request->kota_id,
        'kecamatan_id' => $request->kecamatan_id,
        'pos_id' => $request->pos_id,
        'detail' => $request->detail,
        'note' => $request->note,
    ]);
+
      Return redirect('alamat');
    }

      public function edit($id){
    $alamat = Alamat::find($id);
    return view('user.pages.alamat.edit',compact('alamat'));
  }

    public function edit_proses(Request $request){
    Alamat::where('id',$request->id)->update([

        'user_id' => Auth::id(),
        'provinsi_id' => $request->provinsi_id,
        'kota_id' => $request->kota_id,
        'kecamatan_id' => $request->kecamatan_id,
        'pos_id' => $request->pos_id,
        'detail' => $request->detail,
        'catatan' => $request->catatan,

    ]);


 return redirect('alamat');
  }
    // Alamat::where('id',$request->id)->update([
    //     'user_id' => Auth::id(),
    //     'provinsi_id' =>$request->provinsi_id,
    //     'kota_id' =>$request->kota_id,
    //     'kecamatan_id' =>$request->kecamatan_id,
    //     'pos_id'=>$request->pos_id,
    //     'detail'=>$request->detail,
    //     'note'=>$request->note,
    // ]);

   

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
