<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.customers')->with('customers',Customer::all());
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
        
        $request->validate([
            'name' => 'required',
        ]);
        $customer = new Customer;
        $customer->name = $request->input('name');
        if($request->input('email') == '')
            $customer->email = 'N/A';
        else
            $customer->email = $request->input('email');
        if($request->input('contact') == '')
            $customer->contact = 'N/A';
        else
            $customer->contact = $request->input('contact');
        if($request->input('address') == '')
            $customer->address = 'N/A';
        else
            $customer->address = $request->input('address');
        $customer->user_id = Auth::user()->id;
        $customer->save();

        if($customer){
            return response()->json([
                'status' => 200,
                'message' => 'Customer Created Successfully...!'
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Error...!'
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

    public function refresh(){
        // dd('working');
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 200,
            'customers' => $user->customers
        ]);
    }
}
