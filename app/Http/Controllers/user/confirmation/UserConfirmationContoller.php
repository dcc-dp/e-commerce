<?php

namespace App\Http\Controllers\user\confirmation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserConfirmationContoller extends Controller
{
       public function index(){
        return view('user.pages.confirmation');
    }
}
