<?php

namespace Test;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ViewErrorBag;
use \Mockery as m;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use PHPUnit_Framework_AssertionFailedError;

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

    public function assertRedirectedBack()
    {
        $this->assertRedirectedTo('/');
    }

    protected function shouldRedirectBack($UrlReferer = '')
    {
        $redirection = new RedirectResponse('http://localhost/' . $UrlReferer, 302, []);
        $redirection->setRequest($request = m::mock('Illuminate\Http\Request'));
        $redirection->setSession($session = m::mock('Illuminate\Session\Store'));
        $request->shouldReceive('input')->andReturn([]);
        $session->shouldReceive('flash');
        $session->shouldReceive('flashInput');
        $session->shouldReceive('get')->with('errors', m::any())->andReturn(new ViewErrorBag);

        Redirect::shouldReceive('back')->andReturn($redirection);
        Redirect::shouldReceive('to')->andThrow(new PHPUnit_Framework_AssertionFailedError("Should be redirected back but redirected to an other url"));
    }
}
