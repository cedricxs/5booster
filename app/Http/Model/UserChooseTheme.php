<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserChooseTheme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_choice', 'user_id',
        'id_theme','end_at','theme_parent'
    ];


    protected $primaryKey = 'id_choice';
    public $timestamps = true;
    protected $table = 'userchoosetheme';
}
