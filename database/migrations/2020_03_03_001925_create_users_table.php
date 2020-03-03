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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('password');
            $table->string('telephone');
            $table->string('birthday');
            $table->string('sex');
            $table->string('email');
            $table->string('remember_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'password', 'telephone'
            ,'birthday','sex','email','remember_token','email_verified_at','created_at','updated_at']);
        });
    }
}
