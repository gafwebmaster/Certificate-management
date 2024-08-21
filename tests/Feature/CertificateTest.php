<?php

namespace Tests\Feature;

use App\Models\Certificate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class CertificateTest extends TestCase
{
public function test_see_all_certificates()
    {
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);
        $response = $this->get('/api/certificate/see_all');
        $result = count($response->json());
        $count = Certificate::count();
        $this->assertEquals($count, $result);
        $response->assertSee('"certificate_name":"lxabNT7qo6"', false);
    }

    public function test_see_details_for_one_certificate_by_it_s_id(): void
    {
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);

        $response = $this->get('/api/certificate/1');

        $response->assertStatus(200);
    }

    public function test_insert_certificate(): void
    {
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);
        $newCwertificate=[
            "expiry_date" => "2024-02-24 15:30:24",
            "certificate_type" => "JB0gyITmOM",
            "pci_owner" => "LUDq1izb4T",
            "certificate_name" => "feature_test3",
            "equipment" => "AE3isSGmzv",
            "provider" => "sjSHGQPsbF",
            "contact_name" => "Florin Nou",
            "contact_phone" => "8l0fGr3nNG",
            "email_contact" => "jFH1PtcawYtfj@gmail.com",
            "generated_by" => "v94w81CMzJ",
            "about_certificate" => "NVKujpPwo8",
            "remarks" => "zBUN6ttZ5l"
        ];
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);

        $response = $this->post('/api/certificate/create', $newCwertificate);
        $this->assertDatabaseHas("certificates",["certificate_name"=>"feature_test3"]);

        $response->assertOk();
    }

    public function test_update_certificate($request)
    {
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);

        $newCwertificate=[
            "expiry_date" => "2024-02-24 15:30:24",
            "certificate_type" => "JB0gyITmOM",
            "pci_owner" => "LUDq1izb4T",
            "certificate_name" => "newName",
            "equipment" => "AE3isSGmzv",
            "provider" => "sjSHGQPsbF",
            "contact_name" => "Florin Nou",
            "contact_phone" => "8l0fGr3nNG",
            "email_contact" => "newMail@gmail.com",
            "generated_by" => "v94w81CMzJ",
            "about_certificate" => "NVKujpPwo8",
            "remarks" => "zBUN6ttZ5l"
        ];
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);
        $response = $this->put('/api/certificate/update', $newCwertificate);
        $this->assertDatabaseHas("certificates",["certificate_name"=>"newName"]);
        $response->assertOk();
    }

    public function test_delete_certificate(): void
    {   //Add and delete a certificate

        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);

        $lastInserted = Certificate::all()->last()->id;

        
        $response = $this->get("/api/certificate/delete/$lastInserted");

        if($response){
            $response->assertOk();
        }
    }

    public function test_search_certificate_by_it_s_name(): void
    {
        $user = User::where('id',2)->first();
        Sanctum::actingAs($user, ['*']);

        $response = $this->get('/api/certificate/search/florin');

        $response->assertStatus(200);
    }
}
