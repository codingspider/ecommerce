<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use Session;
use Illuminate\Support\Facades\Redirect;

class ManageOrderController extends Controller
{
    

    public function vieworder(){
    $data= DB::table('customers')->get();
       
        $orders = DB::table('orders')
            ->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.name as cname')
            ->orderBy('order_id', 'DESC')
            ->paginate(20);


        return view('pages.view_order', compact('orders', 'data'));
    }

    public function destroy(Request $request){
    	$p=$request->pid;
    	
    	$results = Order::whereIn('order_id', $p)->delete();
    	
    	return redirect()->back()->with('success', 'IT WORKS!');
    }


    public function unactive($order_id){

        $val = 'pending';
        DB::table('orders')
        ->where('order_id', $order_id)
        ->update(['order_status'=> $val]);
        return redirect::to('/view/all/order');

    }
    public function active($order_id){

        $val = "confirmed";
        DB::table('orders')
        ->where('order_id', $order_id)
        ->update(['order_status'=> $val]);
        return redirect::to('/view/all/order');

    }

        public function view_details($order_id){
            
            $orderby = DB::table('orders')
            ->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->join('payments', 'payments.payment_id', '=', 'orders.payment_id')
            ->join('shipings', 'shipings.shiping_id', '=', 'orders.shiping_id')
            ->select('orders.*', 'order_details.*', 'customers.*',  'payments.*', 'shipings.*' )
            ->where('orders.order_id', $order_id)
            ->get();

            return view('pages.view_order_details', compact('orderby'));
        }
}


