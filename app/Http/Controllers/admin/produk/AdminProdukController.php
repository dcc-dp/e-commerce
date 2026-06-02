<?php

namespace App\Http\Controllers\admin\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
     public function index(){
        return view('admin.produk.index');
    }
}
