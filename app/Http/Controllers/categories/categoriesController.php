<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class categoriesController extends Controller
{
    
    public function index()
    {
        $categories =categories::get();
        return view('categories.index', compact('categories'));
    }


    public  function  create(){
        return view('categories.create');

    }

    public function store(Request $request){
        $input = $request->all();
        $categories = categories::create($input);
        return redirect(route('categories'));

    }

    public function view($id){
        $categories= DB::table('categories')->where('id',$id)->first();
        return view('categories.view')
                ->with('categories', $categories);

    }
    
    public function edit($id){
        $categories= DB::table('categories')->where('id',$id)->first();
        return view('categories.edit', compact('categories'));

    }

    public function update($id, Request $request){
        $updated_by = Auth::id();
        // $request->merge(['updated_by'=>$updated_by]);
        
        $input = $request->except(['_token']);
        $categories = categories::where('id',$id)->update($input);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update categories');
       
       return redirect(route('categories'));

    }

    public function delete($id){
        $delete = categories::destroy($id);

        Session::flash('error', 'Successfully Delete categories');
        
        return redirect(route('categories'));
    }
}
