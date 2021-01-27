<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = [
            'email' => 'test123@gmail.com',
            'password' => 'test123'
        ];
        $response = $this->post('login', $user);
        $response->assertStatus(200);
    }
}
