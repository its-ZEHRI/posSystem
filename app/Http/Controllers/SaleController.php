<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sale;
use App\Models\SoldProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index(){
        $user = Auth::User();
        return view('app.sale')->with('customers', $user->customers);
    }

    public function loadSaleTable(){
        $user = Auth::User();
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

        for ($index = 0; $index < sizeof($request->products_ids); $index++) {
            Product::where('id',$request->products_ids[$index])
                ->decrement('quantity', $request->products_quantities[$index]);
            SoldProduct::create([
                'sale_id'    => $sale->id,
                'product_id' => $request->products_ids[$index],
                'quantity'   => $request->products_quantities[$index]
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);

    }
}
