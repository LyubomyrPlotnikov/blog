<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    /**
     * Open registration form.
     *
     * @return void
     */
    public function testRegistrationForm()
    {
        $this->visit(route('register'))
            ->see(__('Name'))
            ->see(__('E-Mail Address'))
            ->see(__('Confirm Password'));
    }

    /**
     * Perform success registration.
     *
     * @return void
     */
    public function testRegistrationSuccess()
    {
        $this->visit(route('register'))
            ->type('captain_slow', 'name')
            ->type(str_random(6).'@hotmail.com', 'email')
            ->type('capitan_slow', 'password')
            ->type('capitan_slow', 'password_confirmation')
            ->press(__('Register'))
            ->seePageIs(route('home'));
    }

    /**
     * Perform registration with wrong password confirmation.
     */
    public function testRegistrationFailure()
    {
        $this->visit(route('register'))
            ->type('captain_slow', 'name')
            ->type('captain_slow@hotmail.com', 'email')
            ->type('capitan_slow2', 'password')
            ->type('capitan_slow1', 'password_confirmation')
            ->press(__('Register'));
    }
}
