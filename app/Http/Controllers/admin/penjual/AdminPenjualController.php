<?php

namespace App\Http\Controllers\admin\penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminPenjualController extends Controller
{
    public function index()
    {
        $penjual = User::where('role', 'penjual')->orderBy('id', 'desc')->get();
        return view('admin.penjual.index', compact('penjual'));
    }
}
