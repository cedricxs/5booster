<?php


namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_exercise', 'exercise_name',
        'exercise_video_url',
    ];


    protected $primaryKey = 'id_exercise';
    //public $timestamps = false;
    protected $table = 'exercise';

}
