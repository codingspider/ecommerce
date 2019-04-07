<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ManufactureController extends Controller
{
    public function allmanu(){

        return view('pages/all_manufacture');
    }


    public function unactive($id){

        $val = 0;
        DB::table('manufactures')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','manufactures unactive sucessfully');
        return redirect::to('/all/manufacture');

    }
    public function active($id){

        $val = 1;
        DB::table('manufactures')
        ->where('id', $id)
        ->update(['status'=> $val]);
        Session::put('message','manufactures Active sucessfully');
        return redirect::to('/all/manufacture');

    }
    public function delete($id){
        {
            DB::table('manufactures')
            ->where('id', $id)
            ->delete();
    
            Session::put('message','manufactures deleted sucessfully');
            return redirect::to('/all/manufacture');
        }
    }


}
