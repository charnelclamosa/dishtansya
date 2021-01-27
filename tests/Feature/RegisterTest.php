<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_example()
    {
        $user = [
            'email' => 'backend@multisyscorp.com',
            'password' => 'test123'
        ];
        $response = $this->post('register', $user);
        $response->assertStatus(201);
        
    }
}
