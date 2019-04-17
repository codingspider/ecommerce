<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

       $id =  $request->product_id;
       $qty =  $request->quantity;

        $productinfo = DB::table('products')
                    ->where('id', $id)
                    ->first();

        $data['qty'] = $qty;
        $data['id'] = $productinfo->id;
        $data['name'] = $productinfo->name;
        $data['price'] = $productinfo->price;
        $data['options']['images'] = $productinfo->images;


        Cart::add($data);

        return redirect::to('/show/cart');
    }

    public function showcart(){

        $categories = DB::table('categories')
                    ->where('status', '=', 1)
                    ->get();

        return view('pages.shoping_cart', $categories);
    }


    public function delete_to_cart($rowId){

        Cart::update($rowId, 0);

        return redirect::to('/show/cart');

    }
    public function update_to_cart(Request $request){

        $id =  $request->rowId;
        $qty =  $request->qty;

        Cart::update($id, $qty);
 
        return redirect::to('/show/cart');

    }
    public function wishlist(Request $request){


        $id =  $request->id;

 
         $productinfo = DB::table('products')
                     ->where('id', $id)
                     ->first();

 
         $data['qty'] = 1;
         $data['id'] = $productinfo->id;
         $data['name'] = $productinfo->name;
         $data['price'] = $productinfo->price;
         $data['options']['images'] = $productinfo->images;

 
         Cart::instance('wishlist')->add($data);

         return redirect::to('/show/wishlist');

    }
}
