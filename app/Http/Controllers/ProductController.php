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
        ->orderBy('id', 'desc')
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

    public function add_new_products(Request $request){

        request()->validate([

            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $imageName = time().'.'.request()->images->getClientOriginalExtension();

  

        request()->images->move(public_path('images'), $imageName);


        $data = array();
        $data['name'] = $request->name;
        $data['category_id'] = $request->category;
        $data['manufacture_id'] = $request->manufacture;
        $data['description'] = $request->description;
        $data['short_description'] = $request->short_description;
        $data['images'] = $imageName;
        $data['price'] = $request->price;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['status'] = $request->status;

        DB::table('products')->insert($data);

        return redirect::to('/admin/products');


        

  

        

    }


    }

   

