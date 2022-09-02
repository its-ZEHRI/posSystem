<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SoldProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $purchases = $user->purchases;
        $sales = $user->sales;

        return view('app.reports')->with('purchases', $purchases)->with('sales',$sales);
    }
    public function viewReport($id){
        $products = Product::whereHas('soldProducts',function($q) use($id){
            $q->where('product_id',10);
        })->get();
        dd($products->toArray());
        return view('app.view-report');
    }
}
