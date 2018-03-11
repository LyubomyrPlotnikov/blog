<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Open login form.
     *
     * @return void
     */
    public function testLoginForm()
    {
        $this->visit(route('login'))
            ->see(__('Login'))
            ->see(__('E-Mail Address'))
            ->see(__('Password'));
    }

    /**
     * Perform login with correct credentials.
     *
     * @return void
     */
    public function testLoginSubmitSuccess()
    {
        $this->visit(route('login'))
            ->type(config('admin.email'), 'email')
            ->type(config('admin.password'), 'password')
            ->press(__('Login'))
            ->seePageIs(route('home'));
    }

    /**
     * Perform login with wrong credentials.
     */
    public function testLoginSubmitFailure()
    {
        $this->visit(route('login'))
            ->type('captain_slow@hotmail.com', 'email')
            ->type('blahblah', 'password')
            ->press(__('Login'))
            ->seePageIs(route('login'))
            ->see(__('auth.failed'));
    }
}
