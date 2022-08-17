<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use DB;
use App\Models\categories;

class webController extends Controller
{
    public function index(){
    
    $products = DB::table('products')
                    ->join('categories','categories.id','=','products.categories_id')
                    ->select('categories.category_name','products.*')
                    ->get();
    $categories = DB::table('categories')->get();
     return view('web.index',compact('products','categories'));

    }

    public function loadMenu(Request $request){
        if($request->ajax())
        {
           
            $products = DB::table('products')
                ->join('categories','categories.id','=','products.categories_id')
                ->select('categories.category_name','products.*')
                ->get();
            $categories = DB::table('categories')->get();
            return view('web.ajaxIndex',compact('products','categories'));


        }
    }

    public function search(Request $request){
        if($request->ajax())
        {
            if($request->id == 'all'){
                $products = DB::table('products')
                ->join('categories','categories.id','=','products.categories_id')
                ->select('categories.category_name','products.*')
                ->get();
                $categories = DB::table('categories')->get();
                return view('web.search',compact('products','categories'));

            }else{
                $products = DB::table('products')
                ->join('categories','categories.id','=','products.categories_id')
                ->select('categories.category_name','products.*')
                ->where('categories.id',$request->id)
                ->get();
                $categories = DB::table('categories')->get();
                return view('web.search',compact('products','categories'));

            }


        }
    }
}
