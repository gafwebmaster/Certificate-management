<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    //Returns all certificates:
    public function index(){
        return Certificate::all();
    }

    //Adding a certificate:
    public function create(Request $request){
        return ["name"=>"Gabriel"];
    }

    //Returns certificate details:
    public function show(Request $request){
        return ["name"=>"Gabriel"];
    }

    //Editing a certificate:
    public function edit(Request $request){
        return ["name"=>"Gabriel"];
    }

    //Updates a certificate
    public function update(Request $request){
        return ["name"=>"Gabriel"];
    }

    //Deletes a certificate
    public function destroy(Request $request){
        return ["name"=>"Gabriel"];
    }
}