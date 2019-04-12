<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
{
    public function index(){

        return view('pages.all_product');
    }

    public function unactive($id){

        $val = 0;
        DB::table('products')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','manufactures unactive sucessfully');
        return redirect::to('/all/product');

    }
    public function active($id){

        $val = 1;
        DB::table('products')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','manufactures Active sucessfully');
        return redirect::to('/all/product');

    }
    public function delete($id){
        {
            DB::table('products')
            ->where('id', $id)
            ->delete();
    
            Session::put('message','manufactures deleted sucessfully');
            return redirect::to('/all/product');
        }
    }


    public function show_product_category($id){
        $data['products']= DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
        ->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
        ->where('products.status', '=',  1)
        ->where('products.category_id', '=',  $id)
        ->get();
        return view('pages.show_product_by_category',$data);
    }
    public function product_details($id){
        $products_details= DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
        ->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
        ->where('products.status', '=',  1)
        ->where('products.id', '=',  $id)
        ->first();

        return view('pages.show_product_details')->with('products_details', $products_details);
    }

   
}
