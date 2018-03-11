<?php

namespace Tests;

use App\Models\User;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';

    /**
     * Get admin user.
     *
     * @return mixed
     */
    public function getAdminUser()
    {
        return User::email(config('admin.email'))->first();
    }
}
