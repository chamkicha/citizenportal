<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users =DB::table('users')
                    ->join('roles','roles.id','=','users.role')
                    ->select('roles.name','users.*')
                    ->get();
        return view('users.index', compact('users'));
    }


    public  function  create(){

        $roles   = Role::get();

        return view('users.create',compact('roles'));

    }

    public function delete($id){
        $delete = User::destroy($id);

        Session::flash('error', 'Successfully Delete User');
        
        return redirect(route('users'));
    }


    public  function  store(Request $request){

        $user = User::create([ 
            'full_name' => $request->full_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'role' => $request->role,
            'tin_no' => $request->tin_no,
            'password' => Hash::make($request->password),
        ]);


        if ($user){

            Session::flash('alert-success',' successful saved');

        }

        else {

            Session::flash('alert-danger','Server error ');

        }
        return redirect(route('users'));

    }

    public function view($id){
        $users= DB::table('users')->where('id',$id)->first();
        return view('users.view')
                ->with('users', $users);

    }
    
    public function edit($id){
        $users= DB::table('users')->where('id',$id)->first();
        $roles   = Role::get();
        return view('users.edit', compact('users','roles'));

    }

    public function update($id, Request $request){
        $updated_by = Auth::id();
        $request->merge(['updated_by'=>$updated_by]);
        if(!$request->password){
        $input = $request->except(['password']);
        }
        $input = $request->except(['_token']);
        $departments = User::where('id',$id)->update($input);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update Departments');
       
       return redirect(route('users'));

    }
}
