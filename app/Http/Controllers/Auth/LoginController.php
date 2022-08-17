<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
    // protected $redirectTo = RouteServiceProvider::Dashboard;
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    

    //main function for login
    public function login(Request $request)
    {
        // dd(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]));

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger','Password Or Email can not be empty');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else {

            if (Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
                $user =  Auth::user();

                return redirect('dashboard');
            }

            else {


                Session::flash('alert-danger', 'Email or password is incorrect');

                return back();

            }
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
