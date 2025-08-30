<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
       return view('auth.login');
 
    }
    public function prosesLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first(); 
        // dd($user);
        if(empty($user)){
            return back(); 
        } else{
            if($user->password==$request->password){
                return redirect()->route('dashboard-analytics');
            } else{
                return back();
            }
        }
 
    }

}


