<?php

namespace App\Http\Controllers\admin\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'user')->orderBy('id', 'desc')->get();
        return view('admin.customer.index', compact('customers'));
    }

   
}
