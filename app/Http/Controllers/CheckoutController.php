<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start(); 


class CheckoutController extends Controller
{
    public function logincheckout(){

        return view ('pages.login');
    }
    public function registrattion(Request $request){

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['password'] = md5($request->password);

        $customer_id = DB::table('customers')
        ->insertGetId($data);
        

        Session::put('customer_id', $customer_id);
        Session::put('name', $name);
        return redirect::to('/checkout');
    }

    public function checkout(){

        return view('pages.checkout');
    }

    public function save_shipping(Request $request){
        $data = array();
        $data['first_name'] = $request->firstname;
        $data['last_name'] = $request->lastname;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;

       $shiping_id = DB::table('shipings') 
        ->insertGetId($data); 
        
        
        Session::put('shiping_id', $shiping_id);
        return redirect::to('/payment/process');
    }

    public function login(Request $request){

        $customer_email = $request->email;
        $customer_password = md5($request->password);

        $result = DB::table('customers')
                ->where('email', $customer_email)
                ->where('password', $customer_password)
                ->first();

                if($result){

                    Session::put('customer_id', $result->customer_id);
                    return redirect::to('/home');
                }else{
                    return redirect::to('/login/checkout');

                }
    }


    public function payment(){

        // $carts = DB::table('categories')
        //             ->where('status', '=', 1)
        //             ->get();


        return view('pages.payment_method');
    }

    
    public function order_place(Request $request){
        
        $payment_method= $request->groupOfMaterialRadios;
        
        
        $data = array();
        $data['payment_method'] = $payment_method;
        $data['payment_status'] = 'pending';
        $payment_id = DB::table('payments')
        ->insertGetId($data); 

        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shiping_id'] = Session::get('shiping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 'pending';
        $odata['product_id'] =$v_contents->id;

        $order_id = DB::table('orders')
        ->insertGetId($odata); 

        $contents = Cart::content();

        $oddata = array();
        foreach($contents as $v_contents){

            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_contents->id;
            $oddata['product_name'] = $v_contents->name;
            $oddata['product_price'] = $v_contents->price;
            $oddata['product_quantity'] = $v_contents->qty;

            DB::table('order_details')
            ->insert($oddata);
            Cart::destroy();
    
        }

     
        


       return view('pages.thankyou');
    }
}
