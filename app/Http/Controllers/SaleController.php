<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sale;
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


    public function saleProduct(Request $request){

        $sale = Sale::create([
            'total_amount' => $request->total_amount,
            'discount'     => $request->discount,
            'net_amount'   => $request->net_amount,
            'balance'      => $request->balance,
            'paid_amount'  => $request->paid_amount,
            'user_id'      => Auth::User()->id,
            'customer_id'  => $request->customer_id
        ]);

        for ($i=0; $i < sizeof($request->products_ids); $i++) {
            $product = Product::find($request->products_ids[$i]);
            $product->decrement('quantity', $request->products_quantities[$i]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);

    }
}
