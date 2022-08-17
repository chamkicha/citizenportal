<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class TransactionsController extends Controller
{
    public function index(){
        
        $user_id = Auth::user();
        $role = $user_id->role;

       if($role == 1){
           
        $transactions =  DB::connection('mysql2')->table('beneficiaries')
                            ->join('payments','payments.id','=','beneficiaries.payment_id')
                            ->whereDate('beneficiaries.created_at', Carbon::today())
                            // ->where('beneficiaries.beneficiary_id', 'BNO1')
                            ->get();


           return view('transactions.index')
                ->with('today', '0')
                ->with('request', 'request')
               ->with('transactions', $transactions);

       }elseif($role == 2){
           
        $transactions =  DB::connection('mysql2')->table('beneficiaries')
                            ->join('payments','payments.id','=','beneficiaries.payment_id')
                            ->where('beneficiaries.beneficiary_tin', $user_id->tin_no)
                            ->whereDate('beneficiaries.created_at', Carbon::today())
                            ->where('beneficiaries.beneficiary_id', 'BNO1')
                            ->get();

           return view('transactions.index')
                ->with('today', '0')
                ->with('request', 'request')
               ->with('transactions', $transactions);

       }
    }

    
    public function search(Request $request){
        
        $user_id = Auth::user();
        $role = $user_id->role;

        if($role == 1){
            $transactions =  DB::connection('mysql2')->table('beneficiaries')
                                ->join('payments','payments.id','=','beneficiaries.payment_id')
                                ->whereBetween('beneficiaries.created_at', [$request->from, $request->to])
                                // ->where('beneficiaries.beneficiary_id', 'BNO1')
                                ->get();
                
            return view('transactions.index')
            ->with('today', '1')
            ->with('request', $request)
            ->with('transactions',$transactions);
          

        }elseif($role == 2){
            $transactions =  DB::connection('mysql2')->table('beneficiaries')
                                ->join('payments','payments.id','=','beneficiaries.payment_id')
                                ->where('beneficiaries.beneficiary_tin', $user_id->tin_no)
                                ->whereBetween('beneficiaries.created_at', [$request->from, $request->to])
                                // ->where('beneficiaries.beneficiary_id', 'BNO1')
                                ->get();
                
            return view('transactions.index')
            ->with('today', '1')
            ->with('request', $request)
            ->with('transactions',$transactions);
        }

    }

}
