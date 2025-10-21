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
        Auth::logout();
        return redirect()->route('login');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard-analytics');
        }

        return back()->with('error', 'Email atau password salah');
    }
}
