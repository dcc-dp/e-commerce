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
        if (Auth::check())
            return redirect()->route('dashboard-analytics');
        else
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
        Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin-customer');
            }
            return redirect()->route('dashboard-analytics');
        }

        return back()->with('error', 'Email atau password salah');
    }
}
