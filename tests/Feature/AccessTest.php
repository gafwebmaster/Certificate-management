<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_protected_route_by_sanctum_been_logged_out(): void
    {
        $response = $this->get('/certificate/see_all');

        $response->assertStatus(200);
    }

    public function try_to_login_with_wrong_user_password_token(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function loghin_with_rights_credentials(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function make_log_out_then_try_to_access_protected_route_by_sanctum(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


}
