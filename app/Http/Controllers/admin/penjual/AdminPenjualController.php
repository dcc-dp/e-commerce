<?php

namespace App\Http\Controllers\admin\penjual;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPenjualController extends Controller
{
     public function index(){
        return view('admin.penjual.index');
    }
}
