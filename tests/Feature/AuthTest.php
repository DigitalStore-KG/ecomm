<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_unauthenticated_user_cannot_access_product(){
        $response=$this->get('/admin/product/create');
        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }
}
