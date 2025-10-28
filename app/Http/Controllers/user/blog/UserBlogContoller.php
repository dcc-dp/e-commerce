<?php

namespace App\Http\Controllers\user\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserBlogContoller extends Controller
{
     public function index(){
        return view('user.pages.blog');
    }
}
