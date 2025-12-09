<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShopController extends Controller
{
  public function index()
  {
    $dataProduk = Produk::all();
    return view('user.pages.shop', compact('dataProduk'));
  }

  public function search(Request $request)
  {
    $dataProduk = Produk::when($request->search, function ($q) use ($request) {
      $q->where('nama', 'like', "%{$request->search}%");
    })->get();

    return view('user.pages.shop', compact('dataProduk'));
  }
}
