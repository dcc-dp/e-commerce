<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserShopController extends Controller
{
    public function index(){
        $dataProduk=Produk::all();
        return view('user.pages.shop',compact('dataProduk'));
    }
}
