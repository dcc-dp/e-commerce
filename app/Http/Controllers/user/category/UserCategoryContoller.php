<?php

namespace App\Http\Controllers\user\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCategoryContoller extends Controller
{
      public function index(){
        return view('user.pages.category');
    }
}
