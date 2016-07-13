<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class UserControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();


        DB::table('users')->delete();

        $this->admin = Factory::create('admin');

        $this->be($this->admin);
    }

    public function testIndex()
    {
        $this->call('GET', 'admin/users');

        $this->assertResponseOk();
        $this->assertViewHas('users');
    }

    public function testCreate()
    {
        $this->call('GET', 'admin/users/create');

        $this->assertResponseOk();
        $this->assertViewHas('user');
    }

    public function testStore()
    {
        $countUsers = User::count();
        $inputs = [
            'first_name' => 'Prénom',
            'last_name' => 'Nom',
            'email' => 'email@test.com',
            'role' => 'admin',
            'password' => 'password',
        ];

        $this->call('POST', 'admin/users', $inputs);

        $this->assertEquals($countUsers + 1, User::count());
        $this->assertRedirectedTo('admin/users');
    }

    public function testEdit()
    {
        $user = Factory::create('user');

        $this->call('GET', 'admin/users/'.$user->id.'/edit');

        $this->assertResponseOk();
        $this->assertViewHas('user');
    }

    public function testUpdate()
    {
        $oldEmail = 'mymail1@test.com';
        $newEmail = 'mymail2@test.com';
        $newRole = 'admin';
        $user = Factory::create('user', ['email' => $oldEmail]);
        $inputs = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $newEmail,
            'role' => $newRole,
        ];

        $this->shouldRedirectBack();
        $this->call('PUT', 'admin/users/'.$user->id, $inputs);

        $freshUser = User::find($user->id);
        $this->assertEquals($newEmail, $freshUser->email);
    }

    public function testDestroy()
    {
        $user = Factory::create('user');
        $countUsers = User::count();

        $this->shouldRedirectBack();
        $this->call('DELETE', 'admin/users/'.$user->id);

        $this->assertEquals($countUsers - 1, User::count());
    }


}
