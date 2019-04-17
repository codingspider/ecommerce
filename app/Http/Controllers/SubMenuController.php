<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class SubMenuController extends Controller
{
    public function index(){

        return view('pages.add_menu');
    }

    public function storemenu(Request $request){

        $data =array();
        $data['name']= $request->name;
        $data['url']= $request->url;
        $data['parent_id']= $request->parent_id;
        $data['status']= $request->status;

        DB::table('menus')->insert($data);

        

        return redirect::to('/add/sub/menu');
    }

}
