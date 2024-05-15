<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_login(){
        $this->post('/register',['name'=>'hundred', 'email'=>'hundred@gmail.com','password'=>'123456','confirm_password'=>'123456']);
        $response=$this->post('/loginPermission',[
            'email'=>'hundred@gmail.com',
            'password'=>'123456',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }
}
