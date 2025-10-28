<?php

namespace App\Http\Controllers\user\contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContactContoller extends Controller
{
       public function index(){
        return view('user.pages.contact');
    }
}
