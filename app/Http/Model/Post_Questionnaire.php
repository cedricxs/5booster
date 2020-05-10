<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Post_Questionnaire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'question_id', 'user_id',
        'answer',
    ];

    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table = 'post_questionnaire';


}
