<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index()
    {
        $roles =DB::table('roles')->get();
        return view('roles.index', compact('roles'));
    }


    public  function  create(){
        return view('roles.create');

    }

    public function store(Request $request){
        $input = $request->all();
        $role = Role::create($input);
        return redirect(route('role'));

    }

    public function view($id){
        $roles= DB::table('roles')->where('id',$id)->first();
        return view('roles.view')
                ->with('roles', $roles);

    }
    
    public function edit($id){
        $roles= DB::table('roles')->where('id',$id)->first();
        return view('roles.edit', compact('roles'));

    }

    public function update($id, Request $request){
        $updated_by = Auth::id();
        $request->merge(['updated_by'=>$updated_by]);
        
        $input = $request->except(['_token']);
        $role = Role::where('id',$id)->update($input);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update Departments');
       
       return redirect(route('role'));

    }

}
