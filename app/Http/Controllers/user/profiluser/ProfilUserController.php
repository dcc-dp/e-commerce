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

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('user.pages.editprofil', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
