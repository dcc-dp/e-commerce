<?php
namespace App\Http\Controllers\toko\profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('toko.profile.index');
    }
    public function alamat(){
        return view('toko.profile.alamat');
    }
}
