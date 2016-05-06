<?php

namespace Test;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        User::boot();
    }

    public function assertRedirectedBack()
    {
        $this->assertRedirectedTo('/');
    }

    public function createAdminUser()
    {
        return Factory::create(\App\Models\User::class, ['first_name' => 'Admin', 'role' => 'admin']);
    }

    public function createUser()
    {
        return Factory::create(\App\Models\User::class, ['first_name' => 'User', 'role' => 'user']);
    }
}
