<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChooseThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userchoosetheme', function (Blueprint $table) {
            $table->bigIncrements('id_choice');
            $table->bigInteger('user_id');
            $table->bigInteger('id_theme');
            $table->timestamp('end_at');
            $table->bigInteger('theme_parent');
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
        Schema::table('userchoosetheme', function (Blueprint $table) {
            //
        });
    }
}
