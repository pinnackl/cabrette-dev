<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTheFirstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::collection('users')->insert(['email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'role' => 'admin']);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::collection('users')->where('email', 'admin@admin.com')->delete();
    }
}