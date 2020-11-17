<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodepromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepromo', function (Blueprint $table) {
            $table->bigIncrements('id_codepromo');
            $table->string('asso_name');
            $table->string('code');
            $table->Integer('number');
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
        Schema::table('codepromo', function (Blueprint $table) {
            //
        });
    }
}
