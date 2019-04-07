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
}
