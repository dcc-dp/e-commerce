<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
   public function register()
  {
    return view('auth.register');
  } 
     public function prosesRegis(Request $request)
  {
  

    User::create([
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
    return redirect()->route('login');
  } 
}
