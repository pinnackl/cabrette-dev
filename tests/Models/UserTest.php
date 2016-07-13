<?php
use App\Models\User;
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
    /**
     * @expectedException        Starter\ModelValidation\ModelInvalidException
     * @expectedExceptionMessage email: Email
     */
    public function testCantCreateWithInvalidEmail()
    {
        User::create(['email' => 'bob']);
    }

    /**
     * @expectedException        Starter\ModelValidation\ModelInvalidException
     * @expectedExceptionMessage email: Required
     */
    public function testCantCreateWithoutEmail()
    {
        User::create(['email' => '']);
    }
    /**
     * @expectedException        Starter\ModelValidation\ModelInvalidException
     * @expectedExceptionMessage email: Unique
     */
    public function testCantCreateTwoUsersWithTheSameEmail()
    {
        User::create(['email' => 'bob@gmail.com']);
        User::create(['email' => 'bob@gmail.com']);
    }
    /**
     * @expectedException        MongoDuplicateKeyException
     * @expectedExceptionMessage duplicate key error index
     */
    public function testCantCreateTwoUsersWithTheSameEmailWithLowLevelRequest()
    {
        DB::collection('users')->insert(['email' => 'bob@gmail.com']);
        DB::collection('users')->insert(['email' => 'bob@gmail.com']);
    }
}
