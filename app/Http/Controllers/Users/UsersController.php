<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Role;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users  =DB::table('tbluser as u')
            ->select('Fullname','Email','phone_number','u.CreatedDate','RoleName','u.Id')
            ->join('tblrole as r','r.Id','=','u.RoleId')
            ->get();

//        return response()->json($users);

        return view('users.index', compact('users'));
    }


    public  function  create(){

        $roles   = Role::query()->get();
        $userTypes  =  array(['internal'=>1,'external'=>2]);

        return view('users.create',compact('roles','userTypes'));

    }

    public function delete($id){
        $delete = Users::destroy($id);

        Session::flash('error', 'Successfully Delete User');
        
        return redirect('/users/index');
    }


    public  function  store(Request $request){

        $fullname  = $request->FullName;
        $PhoneNumber = $request->PhoneNumber;
        $Email  = $request->Email;
        $Password = $request->Password;
        $RoleId = $request->RoleId;
        $UserType = $request->UserType;

        $user  = new Users();
        $user->Fullname  =  $fullname;
        $user->phone_number  =  $PhoneNumber;
        $user->Email  =  $Email;
        $user->Password  =  Hash::make($Password);
        $user->RoleId  =  $RoleId;
        $user->UserType  =  $UserType;

        $success  =  $user->save();

        if ($success){

            Session::flash('alert-success',' successful saved');

        }

        else {

            Session::flash('alert-danger','Server error ');

        }

       return redirect('users.index');

    }
}
