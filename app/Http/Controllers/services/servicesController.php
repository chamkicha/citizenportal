<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use DB;

class servicesController extends Controller
{
    public function index(){

        $URL  = base_url().'/lantana/v1/wbs/services';

        $services  =  Http::get($URL)->json();

        // $services= DB::table('services')->get();
        return view('services.index')
                ->with('services', $services);

    }

    public function create(){

        return view('services.create');

    }

    public function store(Request $request){
        $this->validate($request, [
            'ServiceCode'  => ['required', 'unique:services,ServiceCode'],
            'ServiceName' => 'required'
        ]);
      
        $serviceName  =  $request->ServiceName;
        $ServiceCode  =  $request->ServiceCode;


        $URL  = base_url().'/lantana/v1/wbs/services';

        $result  =   Http::post(
            $URL,
            ['ServiceName'=>$serviceName,'ServiceCode'=>$ServiceCode,'CreatedUserId'=>1]
        );

        $class  =  'success';
        if ($result['resultcode']=='01'){

            $class  =  'danger';

            Session::flash('alert-'.$class,' '.$result['message']);

            return redirect('services')->withInput();
        }


        Session::flash('alert-'.$class,' '.$result['message']);

        return redirect('services');
    }

    public function edit($id){

        $service= services::find($id);
        return view('services.edit')
                ->with('service', $service);

    }

    public function update($id, Request $request){
        
        $this->validate($request, [
            'ServiceCode'  => ['required', 'unique:services,ServiceCode'],
            'ServiceName' => 'required'
        ]);

        $serviceName  =  $request->ServiceName;
        $ServiceCode  =  $request->ServiceCode;

        $URL  = base_url().'/lantana/v1/wbs/service';

        $result  =   Http::post(
            $URL,
            ['ServiceName '=>$serviceName,'ServiceCode '=>$ServiceCode,'CreatedUserId'=>1]
        );

        $class  =  'success';
        if ($result['resultCode']=='01'){

            $class  =  'danger';
        }

        Session::flash('alert-'.$class,' '.$result['message']);

    }

    public function delete($id){
        
        $delete = services::destroy($id);

        Session::flash('alert-danger', 'Successfully Delete Service');
        
        return redirect('/services/index');
    }
}
