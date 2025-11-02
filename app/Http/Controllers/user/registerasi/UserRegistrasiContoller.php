<?php

namespace App\Http\Controllers\user\registerasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UserRegistrasiContoller extends Controller
{
    public function index(){
        return view('user.pages.registrasi');
    }
}
