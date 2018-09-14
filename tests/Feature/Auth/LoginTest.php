<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use NFUWorkshop\User;
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
