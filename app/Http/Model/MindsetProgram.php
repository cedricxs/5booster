<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class MindsetProgram extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mindsetprogram', 'mindsetprogram_name',
        'mindsetprogram_url','id_theme','view','mindsetprogram_preview_url'
    ];


    protected $primaryKey = 'id_mindsetprogram';
    public $timestamps = true;
    protected $table = 'mindsetprogram';
}
