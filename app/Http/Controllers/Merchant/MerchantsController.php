<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MerchantsController extends Controller
{
    
    
    public function index(){

        $merchants = Http::get('41.59.227.223:8086/api/v1/merchant?Keyword=ALL');
        $merchants = json_decode($merchants);

        return view('merchant.index')
               ->with('merchants', $merchants);

    }

    public function create(){
        
        return view('merchant.create');
    }

    public function store(Request $request){
        dd($request);

        $input = array(
            "Tin" => $request->tin,
            "FullName" => $request->name,
            "DistrictId" => 1,
            "Location" => $request->location,
            "Email" => $request->email,
            "PhoneNumber" => $request->telephone,
            "BankId" => $request->bank,
            "BankAccountNumber" => $request->account,
            "Branch" => $request->branch,
            "BusinessLicense" => $request->business,
            "TinCertificate" => $request->tinno_certificate,
            "BankVerification" => $request->bankverification,
            "StatusCode" => 100,
            "MerchantTypeID" => 1,
            "GroupCode" => $request->group_code,
            "AddOnMobile" => $request->addMobile,
            "HasInternalSystem" => 1,
            "ConnectionOptionID" => 1,
            "EncryptionAllowed" => 1,
            "CommunicationTypeID" => 1,
            "TypeAKey" => null,
            "Port" => 2020,
            "CardSectorData" => null,
            "CardSector" => null,
            "AccessKey" => null,
            "IP" => null,
            "AgreementTypeID" => 1,
            "ContactFullName" => "abuu",
            "ContactPhoneNo" => "0754884484",
            "AggregatorID" => 1,
            "MerchantSourceID" => 1,
            "ModeOfPaymentID" => 1
        );

        $input = json_encode($input);
        dd($input);
        $response = Http::post('41.59.227.223:8086/api/v1/merchant/save?Keyword=INSERT',$input);
        dd($response);

    }

    public function view($merchantTin){

        $merchantWalletDetails = Http::get('41.59.227.223:8086/api/v1/merchant/get-details?Keyword=Get_Merchant_Wallet_Info&MerchantTIN='.$merchantTin);
        $merchantWalletDetails = json_decode($merchantWalletDetails);

        $merchantDetails = Http::get('41.59.227.223:8086/api/v1/merchant/get-details?Keyword=Get_Merchant_Profile_Info&MerchantTIN='.$merchantTin);
        $merchantDetails = json_decode($merchantDetails);


        $Merchant_Bank_Info = Http::get('41.59.227.223:8086/api/v1/merchant/get-details?Keyword=Get_Merchant_Bank_Info&MerchantTIN='.$merchantTin);
        $Merchant_Bank_Info = json_decode($Merchant_Bank_Info);


        $Merchant_Attachment_Info = Http::get('41.59.227.223:8086/api/v1/merchant/get-details?Keyword=Get_Merchant_Attachment_Info&MerchantTIN='.$merchantTin);
        $Merchant_Attachment_Info = json_decode($Merchant_Attachment_Info);

        return view('merchant.view')
               ->with('Merchant_Attachment_Info', $Merchant_Attachment_Info->data)
               ->with('merchantWalletDetails', $merchantWalletDetails->data)
               ->with('Merchant_Bank_Info', $Merchant_Bank_Info->data)
               ->with('merchantDetails', $merchantDetails->data);
    }
}
