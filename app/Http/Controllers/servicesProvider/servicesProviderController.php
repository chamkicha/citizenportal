<?php

namespace App\Http\Controllers\servicesProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services_provider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use DB;

class servicesProviderController extends Controller
{
    public function index(){

        $url  = base_url().'/lantana/v1/wbs/sproviders';

        $service_providers  =  Http::get($url)->json();

//        return $service_providers;
        return view('servicesProvider.index',compact('service_providers'));

        
    }

    public function create(){

        return view('servicesProvider.create');

    }

    public function view($tinNo){


        $service_URL  = base_url().'/lantana/v1/wbs/services';

        $services  =  Http::get($service_URL.'/'.$tinNo)->json();

        if ($services['resultcode']=='01')
        {

            $services =  ['result'=>array()];

        }

        $event_URL  = base_url().'/lantana/v1/wbs/events/'.$tinNo;

        $events  =  Http::get($event_URL)->json();

        // $events;
        if ($events['resultcode']=='01')
        {

            $events =  ['result'=>array()];

        }

        

        $events_owners =DB::table('tblEvenOwnerAgent as u')
            ->select('FirstName','LastName','Email','PhoneNo','u.CreatedDate','OwnerCode')

            ->get();



        return view('servicesProvider.view',compact('services','tinNo', 'events' , 'events_owners'));

    }

    public function store(Request $request){
        
        $this->validate($request, [
            'ServiceProviderName'  => ['required', 'unique:services_providers,ServiceProviderName'],
            'TinNo' => 'required'
        ]);

        $service = services_provider::create([
            'ServiceProviderName' => $request->ServiceProviderName,
            'TinNo' => $request->TinNo
        ]);

        Session::flash('alert-success', 'Successfully Create Service Provider'.' '.$request->ServiceProviderName);
        
        return redirect('/services_provider/index');
    }

    public function edit($id){

        $services_provider= services_provider::find($id);
        return view('servicesProvider.edit')
                ->with('services_provider', $services_provider);

    }

    public function update($id, Request $request){
        
        $this->validate($request, [
            'ServiceProviderName'  => ['required', 'unique:services_providers,ServiceProviderName'],
            'TinNo' => 'required'
        ]);
        
       $service = services_provider::where('id',$id)
                            ->update([
                                'ServiceProviderName' => $request->ServiceProviderName,
                                'TinNo' => $request->TinNo
                             ]);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update Service Provider'.' '.$request->ServiceProviderName);
       
       return redirect('/services_provider/index');

    }

    public function delete($id){
        
        $delete = services_provider::destroy($id);

        Session::flash('alert-danger', 'Successfully Delete Service Provider');
        
        return redirect('/services_provider/index');
    }

}
