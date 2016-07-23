<?php
use App\Models\User;
use Test\Factory;
use Test\TestCase;

class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        User::truncate();
    }
    public function testCreateAndEditUser()
    {
        $count = User::count();
        $user = User::create(['email' => 'bob@gmail.com', 'first_name' => 'Bob']);

        $this->assertEquals($count+1, User::count());
        $user->first_name = 'Bobby';
        $user->save();
    }

    public function testIsAdmin()
    {
        $user = Factory::create('admin');
        $this->assertTrue($user->isAdmin());
    }

    public function testIsUser()
    {
        $user = Factory::create('user');

        $this->assertTrue($user->isUser());
    }
}
