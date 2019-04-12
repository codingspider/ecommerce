<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
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
}
