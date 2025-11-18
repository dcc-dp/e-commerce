<?php

namespace App\Http\Controllers\user\cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartContoller extends Controller
{
      public function index(){
        if (!Auth::check())
        return redirect()->route('userLogin');
        return view('user.pages.cart');
    }
}
