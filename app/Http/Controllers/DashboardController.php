<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function home(){
        

       

           return view('dashboard');

      

    }

    
}
