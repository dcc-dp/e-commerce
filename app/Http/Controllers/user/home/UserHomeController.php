<?php

namespace App\Http\Controllers\user\home;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        $dataProduk=Produk::all();
        return view('user.index', compact('dataProduk'));

    }
}
