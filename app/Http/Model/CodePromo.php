<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CodePromo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_codepromo', 'asso_name',
        'number','code'
    ];


    protected $primaryKey = 'id_codepromo';
    public $timestamps = true;
    protected $table = 'codepromo';
}
