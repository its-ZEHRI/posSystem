<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SoldProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $products = Product::whereHas('soldProducts',function($q) use($id){
        //     $q->where('product_id',$id);
        // })->get();
// return $id;
        $invoice = DB::table('sold_products')
                    ->join('products','sold_products.product_id','=','products.id' )
                    ->join('sales' , 'sold_products.sale_id','=','sales.id')
                    ->select('products.product_name','products.s_price','sales.*')
                    ->get();
        dd($invoice->toArray());
        return view('app.view-report');
    }
}
