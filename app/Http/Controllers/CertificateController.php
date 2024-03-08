<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    //Adding a certificate:
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'expiry_date' => 'required|max:255',
            'certificate_type' => 'required|max:255',
            'pci_owner' => 'required|max:255',
            'certificate_name' => 'required|max:255',
            'equipment' => 'required|max:255',
            'provider' => 'required|max:255',
            'contact_name' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'email_contact' => 'required|max:255',
            'generated_by' => 'required|max:255',
            'about_certificate' => 'required|max:255',
            'remarks' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return redirect('/404')
                    ->withErrors($validator)
                    ->withInput();
        }
 
        $certificate = new Certificate;
        $certificate->expiry_date = $request->expiry_date;
        $certificate->certificate_type = $request->certificate_type;
        $certificate->pci_owner = $request->pci_owner;
        $certificate->certificate_name = $request->certificate_name;
        $certificate->equipment = $request->equipment;
        $certificate->provider = $request->provider;
        $certificate->contact_name = $request->contact_name;
        $certificate->contact_phone = $request->contact_phone;
        $certificate->email_contact = $request->email_contact;
        $certificate->generated_by = $request->generated_by;
        $certificate->about_certificate = $request->about_certificate;
        $certificate->remarks = $request->remarks;

        $result = $certificate->save();
        if($result){
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"Error"];
        }
    }

    //Returns all certificates or returns one certificate details:
    public function show($user_id=null){
        return $user_id?Certificate::find($user_id):Certificate::all();
    }

    //Updates a certificate
    public function update(Request $request){
        $certificate = Certificate::find($request->id);

        $certificate->expiry_date = $request->expiry_date;
        $certificate->certificate_type = $request->certificate_type;
        $certificate->pci_owner = $request->pci_owner;
        $certificate->certificate_name = $request->certificate_name;
        $certificate->equipment = $request->equipment;
        $certificate->provider = $request->provider;
        $certificate->contact_name = $request->contact_name;
        $certificate->contact_phone = $request->contact_phone;
        $certificate->email_contact = $request->email_contact;
        $certificate->generated_by = $request->generated_by;
        $certificate->about_certificate = $request->about_certificate;
        $certificate->remarks = $request->remarks;

        $result = $certificate->save();
        if($result){
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"Error"];
        }
    }

    //Search by namew
    public function search(Request $request){
        return $request->user()->tokenCan('check-status:oValoare');
        if($request->user()->tokenCan('check-status:oValoare')){
            $result = Certificate::where("contact_name","like","%".$request['name']."%")->get();
            if(is_null($result)){
                return ["Result"=> "Did not find any value match"];
            } else {
                return $result;
            }
        }
        return ["Result"=> "Fara abilitate"];
    }

    //Delete a certificate
    public function delete($id){
        $certificate = Certificate::find($id);
        if(empty($certificate)){
            return ["Result"=>"Certificate ID doesn't exist"];
        }
        $result = $certificate->delete();
        if($result){
            return ["Result"=> "Record has been deleted"];
        }else {
            return ["Result"=>"Error"];
        }
    }

    public function errorPage($validator){
        return ["Result"=>$validator];
    }
}