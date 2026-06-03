<?php

namespace App\Http\Controllers\user\home;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        $dataProduk=Produk::where('status', 'approved')->with('batch_foto.fotos')->get();
        return view('user.index', compact(var_name: 'dataProduk'));

    }
}
