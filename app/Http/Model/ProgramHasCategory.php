<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramHasCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_week_program', 'id_sport_category',
    ];


    protected $primaryKey = 'id_week_program';
    public $incrementing = false;
    //public $timestamps = false;
    protected $table = 'ProgramHasCategory';
}
