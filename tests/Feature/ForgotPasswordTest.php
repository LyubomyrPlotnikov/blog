<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    /**
     * Perform forgot password test.
     *
     * @return void
     */
    public function testForgotPasswordForm()
    {
        $this->visit(route('login'))
            ->click(__('Forgot Your Password?'))
            ->type(config('admin.email'), 'email')
            ->press(__('Send Password Reset Link'))
            ->seeText(__('We have e-mailed your password reset link!'));
    }
}
