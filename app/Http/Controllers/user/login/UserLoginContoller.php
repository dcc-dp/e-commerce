<?php

namespace App\Http\Controllers\user\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginContoller extends Controller
{
      public function index(){
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin-customer');
            } elseif (Auth::user()->role == 'penjual') {
                return redirect()->route('dashboard-analytics');
            }
            return redirect()->route('userHome');
        }

        return view('user.pages.login');
    }
    
    public function prosesLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
          if (Auth::user()->role == 'user'){
              return redirect()->route('userHome');
          } 
          
          Auth::logout();
          return back()->with('error', 'Silakan login di halaman khusus toko/admin');
        }

        return back()->with('error', 'Email atau password salah');
    }
}
