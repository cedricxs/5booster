<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 'user_id', 'username', 'password',
            'telephone','birthday','sex','email',
            'remember_token','email_verified_at',
        */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username');
            $table->string('password');
            $table->string('telephone');
            $table->string('birthday');
            $table->string('sex');
            $table->string('email');
            $table->string('remember_token');
            $table->timestamp('email_verified_at');
            $table->timestamps();
        });
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
