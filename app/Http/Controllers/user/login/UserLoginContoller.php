<?php

namespace App\Http\Controllers\user\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginContoller extends Controller
{
      public function index(){
        return view('user.pages.login');
    }
    public function prosesLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
          if (Auth::user()->role=='user'){
              return redirect()->route('userHome');
          } 
          return back()->with('error', 'Akun tidak valid untuk');;
        }

        return back()->with('error', 'Email atau password salah');
    }
}
