<?php

namespace App\Http\Controllers\user\singleproduct;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSingleproductController extends Controller
{
    public function index($id){
        $produk=Produk::find($id)->first();
        return view('user.pages.singleproduct', compact('produk'));
    }
}
