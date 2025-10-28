<?php

namespace App\Http\Controllers\user\singleproduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSingleproductController extends Controller
{
    public function index(){
        return view('user.pages.singleproduct');
    }
}
