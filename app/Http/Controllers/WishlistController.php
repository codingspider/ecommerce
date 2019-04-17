<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class WishlistController extends Controller
{
    public function view (Request $request){

        
        return view ('pages.wishlist');

   
    }
}
