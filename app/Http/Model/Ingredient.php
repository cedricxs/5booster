<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_ingredient', 'ingredient_name',
    ];


    protected $primaryKey = 'id_ingredient';
    public $timestamps = true;
    protected $table = 'ingredient';
}
