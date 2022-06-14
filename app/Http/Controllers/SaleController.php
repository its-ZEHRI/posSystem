<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $products = $user->products;
        $categories = $user->categories;
        return view('app.sale')->with('products',$products)
                               ->with('categories',$categories);
    }
}
