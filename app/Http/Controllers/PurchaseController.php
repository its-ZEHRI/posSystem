<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use illuminate\Database\Eloquent;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::find(Auth::User()->id);
        return view('app.purchase')
            //    ->with('temp_products', $user->temp_products)
               ->with('categories'   , $user->categories)
               ->with('suppliers'    , $user->suppliers);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::User()->id;
        $purchase = Purchase::create($request->all());

        $user = Auth::User();
        $products = $user->temp_products;
        foreach ($products as $product) {
            $product['purchase_id'] = $purchase->id;
            Product::create($product->toArray());
        }
        TempProduct::where('user_id', $user->id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'done'
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
