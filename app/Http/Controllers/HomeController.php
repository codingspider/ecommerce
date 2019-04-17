<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Menus;

session_start(); 

class HomeController extends Controller
{
    public function index(){

        return view ('pages.intro');
    }
    public function logout(){

        Session::flush();

        return view ('pages.intro');
    }
    
   
}
