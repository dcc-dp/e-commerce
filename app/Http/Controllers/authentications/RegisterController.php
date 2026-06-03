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
    $request->validate([
        'nama' => 'required|string|max:32',
        'email' => 'required|email|max:32|unique:users,email',
        'password' => 'required|string|min:6',
        'alamat' => 'required|string|max:128',
        'jkl' => 'required|in:L,P',
        'tmp_lahir' => 'required|string|max:20',
        'tgl_lahir' => 'required|date',
    ]);

    $user = User::create([
        'name' => $request->nama, 
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
      'nomorhp'=>'',
    ]);

    return redirect()->route('login');
  } 
}
