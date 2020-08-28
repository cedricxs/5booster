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
        'id_exercise', 'exercise_name','imgs',
        'exercise_video_url','nb_img'
    ];


    protected $primaryKey = 'id_exercise';
    //public $timestamps = false;
    protected $table = 'exercise';

}
