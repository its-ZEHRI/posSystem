<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $sale_amount = Sale::select('total_amount','balance')->where('user_id',Auth::id())->get();
        // dd($sale_amount->sum('total_amount'));
        $out_of_stock_products = Product::where('user_id' , Auth::id() )->where('quantity' , '<=' , 0)->get();
        return view('app.dashboard')
        ->with('total_sale', $sale_amount->sum('total_amount'))
        ->with('balance', $sale_amount->sum('balance'))
        ->with('out_of_stock_products' , $out_of_stock_products);
    }
}
