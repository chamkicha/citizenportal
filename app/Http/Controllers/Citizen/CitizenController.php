<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CitizenController extends Controller
{
    public function index(){
        return view('citizen.index')
                ->with('hasCitizen', '1');
    }

    public function search(Request $request){
        //dd($request);
        $citizens_details = DB::table('citizens')->get();
        // dd($citizens_details);
        $citizens = array(
            "Tin" => $request->tin,
            "FullName" => $request->name,
        );
        return view('citizen.index')
                ->with('hasCitizen', '0')
                ->with('citizens', $citizens_details);
    }

    public function view($id){
        $citizen = DB::table('citizens')->where('id', $id)->first();
        
        return view('citizen.view')
                ->with('citizen', $citizen);

    }
}
