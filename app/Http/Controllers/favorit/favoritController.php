<?php

namespace App\Http\Controllers\favorit;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use App\Models\Produk;
use Illuminate\Http\Request;

class favoritController extends Controller
{
    public function index(){
         $dataProdukFavorit=Favorit::where('user_id', auth()->user()->id)->get();
        //  dd($dataProduk);
            return view('user.pages.favorit', compact('dataProdukFavorit'));
    }

    public function tambahFavorit(Request $request){
        $request->validate([
            'produk_id'=>'required'
        ]);
        $fromShop=$request->fromShop;
        $fromShop=$fromShop==1;
        $favorit=Favorit::where('user_id', auth()->user()->id)->where('produk_id', $request->produk_id)->first();

        if($fromShop){
            Favorit::create([
                'user_id'=>auth()->user()->id,
                'produk_id'=>$request->produk_id
            ]);
        }else{
            if($favorit){
                $favorit->delete();
            }else{
                Favorit::create([
                    'user_id'=>auth()->user()->id,
                    'produk_id'=>$request->produk_id
                ]);
            }
        }

    return redirect()->route('userFavorit');

    }
}
