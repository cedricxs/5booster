<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sport_category', 'sport_category_name'
    ];


    protected $primaryKey = 'id_sport_category';
    //public $timestamps = false;
    protected $table = 'SportCategory';
}
