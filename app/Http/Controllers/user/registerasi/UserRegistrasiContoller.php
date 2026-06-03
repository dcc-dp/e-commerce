<?php

namespace App\Http\Controllers\user\registerasi;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserRegistrasiContoller extends Controller
{
  public function index()
  {
    return view('user.pages.registrasi');
  }
  public function prosesRegis(Request $request)
  {
    $request->validate([
        'nama' => 'required|string|max:32',
        'email' => 'required|email|max:32|unique:users,email',
        'password' => 'required',
        'alamat' => 'required|string|max:128',
        'jkl' => 'required|in:L,P',
        'tmp_lahir' => 'required|string|max:20',
        'tgl_lahir' => 'required|date',
    ]);

    $user = User::create([
      'name' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'jkl' => $request->jkl,
      'tmp_lahir' => $request->tmp_lahir,
      'tgl_lahir' => $request->tgl_lahir,
      'role' => 'user',
    ]);

    Keranjang::create([
      'user_id' => $user->id,
    ]);

    return redirect()->route('userLogin');
  }
}
