<?php

namespace Tests\Feature;

use App\Models\Certificate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CertificateTest extends TestCase
{
public function see_all_certificates(): void
    {
        $response = $this->get('/certificate/see_all');

        $count = Certificate::count();

        $response->assertStatus(200);
    }

    public function see_details_for_one_certificate_by_it_s_id(): void
    {
        $response = $this->get('/certificate/1');

        $response->assertStatus(200);
    }

    public function insert_certificate(): void
    {
        Certificate::create([
            "expiry_date" => "2024-02-24 15:30:24",
            "certificate_type" => "JB0gyITmOM",
            "pci_owner" => "LUDq1izb4T",
            "certificate_name" => "feature_test",
            "equipment" => "AE3isSGmzv",
            "provider" => "sjSHGQPsbF",
            "contact_name" => "Florin Nou",
            "contact_phone" => "8l0fGr3nNG",
            "email_contact" => "jFH1PtcawYtfj@gmail.com",
            "generated_by" => "v94w81CMzJ",
            "about_certificate" => "NVKujpPwo8",
            "remarks" => "zBUN6ttZ5l"
        ]);

        $response = $this->get('/certificate/create');

        $result = Certificate::where("certificate_name","==","feature_test")->get();
            if(is_null($result)){
                $response->assertStatus(404);
            } else {
                $response->assertStatus(200);
            }
    }

    public function update_certificate($request)
    {
        $certificate = Certificate::find($request->id);

        $certificate->expiry_date = "2024-02-24 15:30:24";
        $certificate->certificate_type = "JB0gyITmOM";
        $certificate->pci_owner = "LUDq1izb4T";
        $certificate->certificate_name = "feature_test";
        $certificate->equipment = "AE3isSGmzv";
        $certificate->provider = "sjSHGQPsbF";
        $certificate->contact_name = "Florin Nou";
        $certificate->contact_phone = "8l0fGr3nNG";
        $certificate->email_contact = "jFH1PtcawYtfj@gmail.com";
        $certificate->generated_by = "v94w81CMzJ";
        $certificate->about_certificate = "NVKujpPwo8";
        $certificate->remarks = "zBUN6ttZ5l";

        $result = $certificate->save();
        $response = $this->get('/certificate/update/1');
        if(is_null($result)){
            $response->assertStatus(404);
        } else {
            $response->assertStatus(200);
        }
        
    }

    public function delete_certificate(): void
    {   //Add and delete a certificate
        Certificate::create([
            "expiry_date" => "2024-02-24 15:30:24",
            "certificate_type" => "JB0gyITmOM",
            "pci_owner" => "LUDq1izb4T",
            "certificate_name" => "feature_test",
            "equipment" => "AE3isSGmzv",
            "provider" => "sjSHGQPsbF",
            "contact_name" => "Florin Nou",
            "contact_phone" => "8l0fGr3nNG",
            "email_contact" => "jFH1Ptcaw1Ytfj@gmail.com",
            "generated_by" => "v94w81CMzJ",
            "about_certificate" => "NVKujpPwo8",
            "remarks" => "zBUN6ttZ5l"
        ]);

        $lastInserted = Certificate::all()->last()->id;

        //Check inserted dates
        $result = Certificate::where('id',$lastInserted)->first();

        //Check if inserted was unsuccessful
        if($result['email_contact']=='jFH1Ptcaw1Ytfj@gmail.com'){
            Certificate::find($lastInserted)->delete();
        }
        
        $response = $this->get("/certificate/delete/$lastInserted");

        if(!$result['email_contact']=='jFH1Ptcaw1Ytfj@gmail.com'){
            $response->assertStatus(200);
        }
    }

    public function search_certificate_by_it_s_name(): void
    {
        $response = $this->get('/certificate/search/florin');

        $response->assertStatus(200);
    }
}
