<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use DB;
use App\Models\categories;
use App\Models\product_properties;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class productsController extends Controller
{
    public function index()
    {
        $categories =categories::get();
        $products =products::get();
        return view('products.index', compact('products','categories'));
    }


    public  function  create(){
        $categories =categories::get();
        return view('products.create', compact('categories'));

    }

    public function store(Request $request){
        
        $product_no = DB::table('global_config');
        $product_no_increment = $product_no->increment('product_no');
        $product_no = $product_no->first()->product_no;
        $request->merge(['product_no'=>$product_no]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/products/';
            $safeName = $product_no . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request->merge(['product_image'=>$safeName]);
        }

        $input = $request->all();
        $products = products::create($input);
        $products= DB::table('products')->where('product_no',$product_no)->first();
        $product_properties= DB::table('product_properties')->where('product_no',$product_no)->get();
            return view('products.view')
                    ->with('product_properties', $product_properties)
                    ->with('products', $products);

    }

    public function view($id){
        $products= DB::table('products')->where('id',$id)->first();
        $product_properties= DB::table('product_properties')->where('product_no',$products->product_no)->get();
        return view('products.view')
                ->with('product_properties', $product_properties)
                ->with('products', $products);

    }
    
    public function edit($id){
        $categories =categories::get();
        $products= DB::table('products')->where('id',$id)->first();
        return view('products.edit', compact('products','categories'));

    }

    public function update($id, Request $request){
        // $request->merge(['updated_by'=>$updated_by]);
        // dd($request);
        $product_no = $request->product_no;

        if ($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/products/';
            $safeName = $product_no . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request->merge(['product_image'=>$safeName]);
        }

        
        $input = $request->except(['_token','image']);
        $products = products::where('id',$id)->update($input);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update products');
       
       return redirect(route('products'));

    }

    public function delete($id){
        $delete = products::destroy($id);

        Session::flash('error', 'Successfully Delete products');
        
        return redirect(route('products'));
    }

    public function addproperty(Request $request){
        $input = $request->all();
        $product_properties = product_properties::create($input);

        

        $products= DB::table('products')->where('product_no',$request->product_no)->first();
        $product_properties= DB::table('product_properties')->where('product_no',$request->product_no)->get();
        return view('products.view')
                ->with('product_properties', $product_properties)
                ->with('products', $products);

    }
    

    public function deleteproperty($id){
        $delete_product_properties = product_properties::destroy($id);
        return redirect(route('products'));


    }
}
