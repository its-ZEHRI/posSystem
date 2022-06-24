<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SaleController extends Controller
{
    public function index(){
        $user = User::find(Auth::User()->id);
        return view('app.sale')->with('customers', $user->customers);
    }
    public function loadSaleTable(){
        $user = User::find(Auth::User()->id);
        $products = $user->products;
        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}
