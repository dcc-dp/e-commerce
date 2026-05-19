<?php

namespace App\Http\Controllers\toko\pemasukan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PemasukanController extends Controller
{
    public function pemasukan (){
        return view('toko.pemasukan.index');
    }
      
    public function tambah (){
        return view('toko.pemasukan.pemasukann');
    }
}