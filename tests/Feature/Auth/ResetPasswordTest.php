<?php

namespace Tests\Feature\Auth;

use Carbon\Carbon;
use Tests\TestCase;
use NFUWorkshop\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testResetPassword()
    {
        $user = factory(User::class)->create();
        \DB::insert('INSERT INTO password_resets (`email`, `token`, `created_at`) VALUES (?, ?, ?)', [
            $user->email, bcrypt($token = str_random(20)), Carbon::now()
        ]);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertTrue(\Hash::check('new_password', User::find($user->id)->password));
    }
}
