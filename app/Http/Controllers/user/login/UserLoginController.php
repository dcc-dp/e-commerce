<?php

namespace App\Http\Controllers\user\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index(){
        return view('user.pages.login');
    }
}
