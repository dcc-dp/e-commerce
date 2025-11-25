<?php

namespace App\Http\Controllers\user\singleproduct;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Ulasan;
use Illuminate\Http\Request;


class UserSingleproductController extends Controller
{
    public function index($id){
        $produk=Produk::find($id); 
        $dataulasan=Ulasan::where('produk_id', $id)->get();

        return view('user.pages.singleproduct',compact('produk','dataulasan'));
    }

    public function ulasanStore(Request $request){
        
        $request->validate([
            'produk_id',
            'ulasan',
            'rating',
        ]);
        $ulasan=Ulasan::where('user_id', auth()->user()->id)->where('produk_id', $request->produk_id)->first();

        if($ulasan){
           $ulasan->ulasan=$request->ulasan;
           $ulasan->rating=$request->rating;
           $ulasan->save();
        } else{
          Ulasan::create([
            'user_id'=>auth()->user()->id,
            'produk_id'=>$request->produk_id,
            'ulasan'=>$request->ulasan,
            'rating'=>$request->rating,
        ]);  
        }

        

        return redirect()->route('userSingleproduct', $request->produk_id);
    }
}
