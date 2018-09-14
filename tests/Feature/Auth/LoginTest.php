<?php

namespace Tests\Feature\Auth;

use NFUWorkshop\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertTrue(auth()->check());
    }
}
