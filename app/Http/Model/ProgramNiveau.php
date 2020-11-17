<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramNiveau extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_program_niveau', 'program_niveau_name'
    ];


    protected $primaryKey = 'id_program_niveau';
    //public $timestamps = false;
    protected $table = 'programniveau';
}
