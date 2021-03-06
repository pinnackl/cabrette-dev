<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection('users')->insert(['email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'role' => 'admin']);

        DB::collection('posts')->insert(['title' => 'association']);
        DB::collection('posts')->insert(['title' => 'cabrette']);
        DB::collection('posts')->insert(['title' => 'newsletter']);
    }
}
