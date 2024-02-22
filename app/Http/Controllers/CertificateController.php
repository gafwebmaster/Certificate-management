<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(){
        return ["name"=>"Gabriel"];
    }

    public function create(Request $request){
        return ["name"=>"Gabriel"];
    }
}