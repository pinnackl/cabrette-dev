<?php

namespace tests\Http\Middleware;
use Test\Factory;
use Test\TestCase;

class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->user =  Factory::create('user');
        $this->be($this->user);
    }

    public function testUnUserNePeutPasAccederAuxPagesInterdites()
    {
        $forbidden = [
            '/admin/users',
        ];

        foreach($forbidden as $uri) {
            $this->get($uri);
            $this->assertRedirectedTo('/');
        }
    }
}


