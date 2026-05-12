<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatBeliController extends Controller
{
    public function index(){
        $dataProduk=Produk::all();
        $user=User::find(Auth::id());
        return view('user.pages.riwayatbeli', compact('user'));
    }
}
