<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ClientHasCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_client', 'id_sport_category'
    ];


    //protected $primaryKey = 'id_week_program';
    //public $timestamps = false;
    protected $table = 'ClientHasCategory';
}
