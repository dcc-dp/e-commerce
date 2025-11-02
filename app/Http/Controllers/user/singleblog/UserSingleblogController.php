<?php

namespace App\Http\Controllers\user\singleblog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSingleblogController extends Controller
{
    public function index(){
        return view('user.pages.singleblog');
    }
}
