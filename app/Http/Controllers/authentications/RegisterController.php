<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
  public function register(){
    return view('auth.register');
  } 
  public function prosesRegis(Request $request){
  

    $user = User::create([
        'nama' => $request->nama, 
        'alamat' => $request->alamat,
        'email'=> $request->email,
        'password' =>bcrypt($request->password),
        'jkl'=>$request->jkl,
        'tmp_lahir'=>$request->tmp_lahir,
        'tgl_lahir'=>$request->tgl_lahir,
        'foto'=>$request->foto,
        'role'=>'penjual',
    ]);
    Umkm::create([
      'user_id'=>$user->id,
      'nama'=>'',
      'deskripsi'=>'',
      'alamat'=>'',
    ]);
    return redirect()->route('login');
  } 
}
