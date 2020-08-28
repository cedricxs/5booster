<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Exercise', function (Blueprint $table) {
            $table->bigIncrements('id_exercise');
            $table->string('exercise_name');
            $table->string('imgs');
            $table->string('exercise_video_url');
            $table->integer('index_program');
            $table->integer('nb_img');
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
        Schema::dropIfExists('Exercise');
    }
}
