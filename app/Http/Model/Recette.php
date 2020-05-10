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
        'id', 'title', 'url_preview',
        'url_recette','repas','diet',
    ];

    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table = 'recettes';

    public function addView()
    {
        $this->view++;
        $this->save();
    }
}
