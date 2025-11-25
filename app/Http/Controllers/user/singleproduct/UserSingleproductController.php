<?php

namespace App\Http\Controllers\user\singleproduct;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;


class UserSingleproductController extends Controller
{
    public function index($id){
        $produk=Produk::find($id); 
        return view('user.pages.singleproduct',compact('produk'));
    }
}
