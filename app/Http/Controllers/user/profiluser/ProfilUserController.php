<?php

namespace App\Http\Controllers\user\ProfilUser;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilUserController extends Controller
{
    public function index(){
        $dataProduk=Produk::all();
        $user=User::find(Auth::id());
        return view('user.pages.profiluser', compact('user'));
    }
}
