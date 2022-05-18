<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{

    public  function  index(){

        $URL  = base_url().'/lantana/v1/wbs/events';

        $events  =  Http::get($URL)->json();

        if ($events['resultcode']!='0')
        {

            Session::flash('alert-warning',''.$events['message']);

            $events =  ['result'=>array()];

        }

        return view('events.index', compact('events'));

    }

    public  function  create(){

        $url  = base_url().'/lantana/v1/wbs/sproviders';

        $merchants  =  Http::get($url)->json();

        $owners  =DB::select('EXEC Get_EventOwner_SP ');

        $eventCode  =  DB::select('EXEC Get_ActiveEventCode_SP')[0];

//        return  $eventCode->EventCode;
        return view('events.create',compact('eventCode','merchants','owners'));

    }

    public  function  store(Request $request){

        Log::channel('event-ticket')->info('Request : '.json_encode($request->all()));
        $URL  = base_url().'/lantana/v1/wbs/events';

        $date = new Carbon($request->EventDate);


        $dateT  =  date('Y-m-d H:i',$date->getTimestamp());


        try{
            $result  =  Http::post($URL,

                [
                    'EventName'=>$request->EventName,
                    'EventCode'=>$request->EventCode,
                    'MerchantServCode'=>$request->MerchantServCode,
                    'EventDate'=>$dateT,
                    'OwnerCode'=>$request->Owner

                ]
            );

            $class  =  'success';
            if ($result['resultcode']!='0'){


                Session::flash('alert-danger',' '.$result['message']);

                return redirect('management/events/create')->withInput();

            }


            Session::flash('alert-'.$class,' '.$result['message']);
            return redirect('events');
        } catch (\Exception $exception){

            Session::flash('alert-danger',' Server error ');

            return redirect('management/events/create')->withInput();
        }


    }


    public  function  view($eventCode,$eventName){

        $URL  = base_url().'/lantana/v1/wbs/ticket-price/'.$eventCode;
        $url_sproviders  = base_url().'/lantana/v1/wbs/sproviders';

        $events  =  Http::get($URL)->json();
        $merchants  =  Http::get($url_sproviders)->json();
        $EventCode = $eventCode;

        $priceCode  =  DB::select('EXEC Get_PriceCode_SP');

        $priceCode=  $priceCode[0];

        if ($events['resultcode']!='0')
        {
            Session::flash('alert-warning',''.$events['message']);

            $events =  ['result'=>array()];

        }
        return view('events.view', compact('eventCode','events','eventName','priceCode','EventCode','merchants'));

    }

    public  function  create_ticket_category($EventCode){

        $url  = base_url().'/lantana/v1/wbs/sproviders';

        $merchants  =  Http::get($url)->json();

        $priceCode  =  DB::select('EXEC Get_PriceCode_SP');

        $priceCode=  $priceCode[0];

//        $status  =  array(['Active'=>1,'Inactive'=>0]);

        return view('events.create_event_category',compact('priceCode','EventCode','merchants'));

    }


    public  function  update_on_ussd($eventCode,$eventName){

        $URL  = base_url().'/lantana/v1/wbs/ticket-price/'.$eventCode;

        $events  =  Http::get($URL)->json();

        if ($events['resultcode']!='0')
        {
            Session::flash('alert-warning',''.$events['message']);

            $events =  ['result'=>array()];

        }

        return view('events.view', compact('eventCode','events','eventName'));

    }


    public  function  getMerchantCode($TinNo){

        $URL  = base_url().'/lantana/v1/wbs/services/'.$TinNo;

        $events  =  Http::get($URL)->json();

        return $events;

    }


    public  function  getMerchantCategoryByMsCode($msCode){

        $URL  = base_url().'/lantana/v1/wbs/categories/'.$msCode;

        $categories  =  Http::get($URL)->json();

        return $categories;

    }

    public  function  storeTicketCategory(Request $request){

        $url  = base_url().'/lantana/v1/wbs/ticket-pricing';

//        return response()->json($request->all());
        $result   =  Http::post($url,
            [
                "CategoryCode"=>$request->CategoryCode,
                "EventCode"=>$request->EventCode,
                "MaxCapacity"=>$request->MaximumCapacity,
                "Price"=> $request->Price,
                "PriceCode"=> $request->PriceCode,
                "Status"=> (int)$request->Status
            ]
        );

        $class  =  'success';
        if ($result['resultcode']!='0'){


            Session::flash('alert-warning',''.$result['message']);

            return back()->withInput();

        }


        Session::flash('alert-'.$class,' '.$result['message']);
        return redirect('/events/view/'.$request->EventCode);

    }

}
