<?php

namespace App\Http\Controllers\user\elements;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserElementsController extends Controller
{
    public function index(){
        return view('user.pages.elements');
    }
}
