<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramObject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_program_object', 'program_object_name'
    ];


    protected $primaryKey = 'id_program_object';
    //public $timestamps = false;
    protected $table = 'programobject';
}
