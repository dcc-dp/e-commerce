<?php

namespace App\Http\Controllers\user\cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCartContoller extends Controller
{
      public function index(){
        return view('user.pages.cart');
    }
}
