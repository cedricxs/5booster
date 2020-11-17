<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class RecetteHasIngredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_ingredient',
        'id_recette','quantite',
    ];


    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = 'recettehasingredient';
}
