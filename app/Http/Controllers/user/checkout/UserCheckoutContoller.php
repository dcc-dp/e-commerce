<?php

namespace App\Http\Controllers\user\checkout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCheckoutContoller extends Controller
{
      public function index(){
        return view('user.pages.category');
    }
}
