<?php

namespace App\Http\Controllers\validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(){

        return view('validation.index')
            ->with('has_result', '0');

    }

    public function search(Request $request){
        $validation = array(
            "result" => '1',
            "message" => 'valid',
        );

        return view('validation.index')
            ->with('validation', $validation)
            ->with('has_result', '1');
    }
}
