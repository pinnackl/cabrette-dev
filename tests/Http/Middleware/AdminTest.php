<?php


use Test\Factory;
use Test\TestCase;

class AdminTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->admin =  Factory::create('admin');
        $this->be($this->admin);
    }

    public function testUnAdminPeutAccederAuxPagesAutorisees()
    {
        $authorized = [
            '/admin/users',
            '/admin/forums',
            '/admin/announces',
            '/admin/users',
            '/admin/images',
            '/admin/comments',
            '/admin/categories',
            '/admin/medias',
        ];

        foreach($authorized as $uri) {
            $this->get($uri);
            $this->assertResponseOk();
        }
    }
}


