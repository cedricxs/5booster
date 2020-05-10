<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'type',
        'texte','answer',
    ];

    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table = 'questionnaire';


}
