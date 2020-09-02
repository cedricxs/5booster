<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramHasExercise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_week_program', 'id_exercise'
    ];


    protected $primaryKey = 'id_exercise';
    public $incrementing = false;
    //public $timestamps = false;
    protected $table = 'ProgramHasExercise';
}
