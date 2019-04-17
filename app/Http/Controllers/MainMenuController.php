<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class MainMenuController extends Controller
{
    public function index(){
        return view('pages.main_menu');
    }
   

    public function store(Request $request){

        $data =array();
        $data['name']= $request->name;
        $data['url']= $request->url;
        $data['status']= $request->status;

        DB::table('main_menus')->insert($data);

        

        return redirect::to('/menus');
    }

 

    
}
