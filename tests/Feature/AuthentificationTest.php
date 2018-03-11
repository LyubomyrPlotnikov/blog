<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthentificationTest extends TestCase
{

    /**
     * Perform verification of access to protected resources.
     */
    public function testVerifyAccess()
    {
        $this->visit(route('register'))
            ->type('captain_slow', 'name')
            ->type(str_random(6).'@hotmail.com', 'email')
            ->type('capitan_slow', 'password')
            ->type('capitan_slow', 'password_confirmation')
            ->press(__('Register'))
            ->seePageIs(route('home'));

        $this->visit(route('posts.create'))
            ->see('You are not authorized to perform this action.');
    }

    /**
     * Perform check that authenticated user cannot access guest routes.
     */
    public function testRedirectAuthenticated()
    {
        $this->actingAs($this->getAdminUser())
            ->visit(route('login'))
            ->seePageIs(route('home'));
    }
}
