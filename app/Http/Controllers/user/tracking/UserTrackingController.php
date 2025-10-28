<?php

namespace App\Http\Controllers\user\tracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTrackingController extends Controller
{
    public function index(){
        return view('user.pages.tracking');
    }
}
