<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterationTest extends TestCase
{
    public function test_user_registration()
    {
        $response = $this->post('/register', [
            'name' => 'Shrief Mohamed',
            'email' => 'shrief@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertRedirect('home');
    }
}
