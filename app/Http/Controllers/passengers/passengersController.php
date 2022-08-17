<?php

namespace App\Http\Controllers\passengers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class passengersController extends Controller
{
    public function index(){
        
        $passengers =  DB::connection('mysql2')->table('passengers')
                            ->join('journers','journers.payment_id','=','passengers.payment_id')
                            ->whereDate('passengers.created_at', Carbon::today())
                            ->select('passengers.*', 'journers.*')
                            ->orderBy('passengers.id', 'desc')
                            ->get();


           return view('passengers.index')
                  ->with('today','0')
                  ->with('passengers',$passengers);
    }

    public function search(Request $request){
                       
        $passengers =  DB::connection('mysql2')->table('passengers')
                            ->join('journers','journers.payment_id','=','passengers.payment_id')
                            ->whereBetween('passengers.created_at', [$request->from, $request->to])
                            ->orderBy('passengers.id', 'desc')
                            ->get();


                            return view('passengers.index')
                                   ->with('today','1')
                                   ->with('request',$request)
                                   ->with('passengers',$passengers);
    }

    public function search_java(Request $request){
                       
        if($request->full_name){
            $passengers =  DB::connection('mysql2')->table('passengers')
                            ->join('journers','journers.payment_id','=','passengers.payment_id')
                            ->where('passengers.full_name','LIKE','%'.$request->full_name."%")
                                ->get();
    
            return view('passengers.search')
                    ->with('passengers',$passengers);

        }
        elseif($request->mobile_phone){
            $passengers =  DB::connection('mysql2')->table('passengers')
                            ->join('journers','journers.payment_id','=','passengers.payment_id')
                            ->where('passengers.mobile_phone','LIKE','%'.$request->mobile_phone."%")
                            ->get();
    
            return view('passengers.search')
                    ->with('passengers',$passengers);

        }
        elseif($request->ticket_id){
            $passengers =  DB::connection('mysql2')->table('passengers')
                                ->join('journers','journers.payment_id','=','passengers.payment_id')
                                ->where('passengers.ticket_id','LIKE','%'.$request->ticket_id."%")
                                ->get();
    
            return view('passengers.search')
                    ->with('passengers',$passengers);

        }

    }
}
