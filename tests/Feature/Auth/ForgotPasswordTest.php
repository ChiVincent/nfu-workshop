<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use NFUWorkshop\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testForgotPassword()
    {
        Notification::fake();

        $user = factory(User::class)->create();

        $response = $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class);
        $response->assertRedirect('/');
    }
}
