<?php

namespace Tests\Unit;

use App\Models\Formularios;
use Illuminate\Routing\Route;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login()
    {
        $this->get('/login')->assertStatus(200);
    }

    public function test_logout()
    {
        $this->get('/logout')->assertStatus(200);
    }

    public function test_login_user()
    {
        $this->get('/login');
        $credentials = [
            "email" => "admin@demo.com",
            "password" => "12345678"
        ];

        $this->post('/login', $credentials);
        $this->assertCredentials($credentials);
    }
}
