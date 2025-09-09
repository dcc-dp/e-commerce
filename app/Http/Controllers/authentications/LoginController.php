<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as fila;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        if (fila::get('cek'))
            return redirect()->route('dashboard-analytics');
        else
            return view('auth.login');
 
    }

    public function logout(){
        fila::put('cek', false);
        return redirect()->route('login');
    }

    public function prosesLogin(Request $request)
    {
        fila::put('cek',false);
        $user = User::where('email', $request->email)->first(); 
        
        if(empty($user)){
            return back(); 
        } else{
            if($user && Hash::check($request->password, $user->password)){ 
                fila::put('id_user', $user->id);
                fila::put('nama_user', $user->nama);
                fila::put('role_user', $user->role);
                fila::put('cek',true);
                return redirect()->route('dashboard-analytics');
            } else{
                return back();
            }
        }
 
    }

}


