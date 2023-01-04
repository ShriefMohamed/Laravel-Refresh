<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserRegisterationEmail extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_registeration_email()
    {
        $user = DB::table('users')->where('id', 1)->first();

    }
}
