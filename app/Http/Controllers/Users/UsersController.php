<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use DB;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index')
                ->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
        dd('sisi');
    }

    public function store(Request $request){
        // dd($request->first_name.' '.$request->last_name);



        $user = Users::create([
            'full_name' => $request->first_name.' '.$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'gender' => $request->gender,
            'role' => $request->role,
            'location' => $request->location,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(route('admin.oPD.oPDS.show', [$opds_id]))->with('success', 'OPD saved successfully');
    }
}
