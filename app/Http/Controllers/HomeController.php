<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

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
