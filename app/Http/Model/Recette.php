<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_recette', 'recette_name', 'url_preview',
       'view','description',
    ];

    protected $primaryKey = 'id_recette';
    //public $timestamps = false;
    protected $table = 'recettes';

    public function addView()
    {
        $this->view++;
        $this->save();
    }
}
