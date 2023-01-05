<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_login_true()
    {
        $this->post('/login', [
            'email' => 'shrief@gmail.com',
            'password' => '12345678'
        ])->assertRedirect('/home');
    }

    public function test_user_login_false()
    {
        $this->post('/login', [
            'email' => 'shrief@gmail.com',
            'password' => '12345678'
        ])->assertRedirect('/login');
    }

    public function test_profile_loading()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get('/profile')->assertStatus(200);
    }

//    public function test_profile_update()
//    {
//        $user = User::factory()->create();
//        $this->actingAs($user)->post('/profile', [
//            'name' => 'John Doe',
//            'email' => 'john@gmail.com'
//        ])->assertRedirect('/home');
//    }
}
