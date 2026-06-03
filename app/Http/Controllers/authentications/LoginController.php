<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin-customer');
            } elseif (Auth::user()->role == 'penjual') {
                return redirect()->route('dashboard-analytics');
            }
            // Jika role adalah 'user', biarkan dia melihat form login admin/penjual
        }

        return view('auth.login');
    }

    public function logout(){
        $role=Auth::user()->role;
        Auth::logout();

        if($role=='penjual' || $role=='admin'){
            return redirect()->route('login');
        } 
        
        return redirect()->route('userLogin');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Auth::attempt otomatis akan menghapus session user lama dan menggantinya dengan yang baru jika sukses
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin-customer');
            } elseif(Auth::user()->role == 'penjual') {
                return redirect()->route('dashboard-analytics');
            }

            // Jika yang login ternyata adalah 'user' biasa, kita batalkan
            Auth::logout();
            return back()->with('error', 'Akun ini bukan Admin atau Penjual');
        }

        return back()->with('error', 'Email atau password salah');
    }
}
