<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //main function for login
    public function WebLogin(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        $option  = null;
        if (is_numeric($request->username)){

            $request->merge(['phone_number' =>$request->username]);

            $option =  'phone';
        }
        else {

            $request->merge(['email' =>$request->username]);

            $option =  'email';

        }

//        return response()->json($request->all());

        if ($validator->fails()) {

            Session::flash('alert-danger','Fill all field(s)');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $username= $request->email;
        $password = $request->password;

        if ($option=='phone'){

            $credentials = $request->only('phone_number', 'password');

            if (Auth::attempt($credentials)) {

                return redirect()->route('dashboard');

            }

        }

        else if ($option=='email'){

            $credentials = $request->only('email', 'password');

            if (Auth::guard('eventOwner')->attempt($credentials)) {

//                return redirect()->route('dashboard');

                DB::table('tblEvenOwnerAgent')->where(['email'=>$username])->update(['MerchantTin'=>$request->tin]);

//                dd(Auth::guard('eventOwner')->user());


                return redirect()->route('event-agent-dashboard');

            }
            Session::flash('alert-danger','Invalid email or password or input');

            return redirect('/');
        }
        else{

            Session::flash('alert-danger','Invalid phone number or password or input');

            return redirect('/');
        }


        Session::flash('alert-danger','Invalid phone number or password');

        return redirect('/');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
