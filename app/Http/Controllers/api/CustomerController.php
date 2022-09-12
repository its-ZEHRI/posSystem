<?php

namespace App\Http\Controllers\api;

use Whoops\Run;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SoldProduct;

class CustomerController extends Controller
{
    public function login(Request $request){

        $validator = Validator($request->all(),[
            'email' => 'required|email'
        ]);

        if($validator->fails())
            return ErrorResponse($validator->errors()->first());

        $customer = Customer::where('email',$request->email)->first();

        if($customer){
            $data = User::with(['Customers' => fn($query) => $query->where('email' , $customer->email)])
                    ->withCount(['sales as Total_invoices' => fn($query) => $query->where('customer_id',$customer->id)])
                    ->withSum(['sales as Total_amount' => fn($query) => $query->where('customer_id',$customer->id)],'total_amount')
                    ->get();
            return SuccessResponse($data);
        }else{
            return ErrorResponse('Invalid credentials');
        }

    }

    public function get_invoices(Request $request){
        $validator = Validator($request->all(),[
            'email' => 'required|email',
            'id' => 'required' // user_id
        ]);

        if($validator->fails())
            return ErrorResponse($validator->errors()->first());

        $customer = Customer::where('email',$request->email)->first();
           
        if($customer){
            $data = Sale::where(['customer_id' => $customer->id, 'user_id' => $request->id])->get();
            return SuccessResponse($data);
        }else{
            return ErrorResponse('Invalid credentials.');
        }
    }

    public function get_single_invoice(Request $request){
        $validator = Validator($request->all(),[
            'id' => 'required'  // sale id
        ]);

        if($validator->fails())
            return ErrorResponse($validator->errors()->first());

        $invoice = Sale::find($request->id);

        if($invoice){
            $data = Sale::with('soldProduct','soldProduct.products')
                        ->where('id',$request->id)->first();
            return SuccessResponse('jkhkjh');
        }else{
            return ErrorResponse('Invalid credentials');
        }
    }
}
