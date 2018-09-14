<?php

namespace Tests\Feature\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use NFUWorkshop\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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
