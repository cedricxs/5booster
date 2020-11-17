<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMindsetprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MindsetProgram', function (Blueprint $table) {
            $table->bigIncrements('id_mindsetprogram');
            $table->string('mindsetprogram_name');
            $table->string('mindsetprogram_url');
            $table->string('mindsetprogram_preview_url');
            $table->bigInteger('id_theme');
            $table->integer('view');
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
        Schema::table('MindsetProgram', function (Blueprint $table) {
            //
        });
    }
}
