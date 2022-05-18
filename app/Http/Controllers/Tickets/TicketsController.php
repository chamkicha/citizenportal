<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class TicketsController extends Controller
{

    public  function  searchBydate(){

        $URL  = base_url().'/lantana/v1/wbs/tinified-events/20020020';

        $events  =  Http::get($URL)->json();

        if ($events['resultcode']=='01')

        {
            $events =  ['result'=>array()];

        }

        $ownerCode  =  Auth::guard('eventOwner')->user()->OwnerCode;

        $EventOwners =    DB::select('EXEC Get_EventByOwnerCode_SP ?',array($ownerCode));

        $url  = base_url().'/lantana/v1/wbs/sproviders';

        if(Auth::getDefaultDriver()=='eventOwner')

        {

            $merchants  =  DB::select('EXEC Get_OwnerAccessListByOwnerCode_SP ?',array($ownerCode));

            if (isset($merchants[0]->resultcode)){

                $merchants  =  array();

            }

        }

        else {

            $merchants  =  Http::get($url)->json();

        }

        return view('tickets.search',compact('merchants','events','EventOwners'));

    }
}
