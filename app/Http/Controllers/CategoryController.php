<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CategoryController extends Controller
{
    public function allcat(){

        return view('pages/all_category');
    }


    public function unactive($id){

        $val = 0;
        DB::table('categories')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','category unactive sucessfully');
        return redirect::to('/all/category');

    }
    public function active($id){

        $val = 1;
        DB::table('categories')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','category Active sucessfully');
        return redirect::to('/all/category');

    }
    public function delete($id){
        {
            DB::table('categories')
            ->where('id', $id)
            ->delete();
    
            Session::put('message','category deleted sucessfully');
            return redirect::to('/all/category');
        }
    }



}
