<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unique();
            $table->string('profile_image')->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('batch');
            $table->string('branch');
            $table->string('course');
            $table->integer('semester');
            $table->string('address',400)->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->string('about_me',700)->nullable();
            $table->string('user_type')->default('USER');
            $table->boolean('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        $crypted = bcrypt('adminPassword');
        $users = array(
            array('reg_id'=>0, 'firstname'=>'Admin', 'lastname'=>'Admin', 'email'=>'admin@admin.in', 'password'=>$crypted,'batch'=>'0000','branch'=>'no branch','course'=>'no course','semester'=>'0','user_type'=>'ADMIN')
        );
        DB::table('users')->insert($users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
