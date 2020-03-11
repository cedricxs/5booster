<?php


namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'url_preview',
        'url_workout','focus','type','difficulty','view'
    ];


    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table = 'workouts';

    public function addView()
    {
        $this->view++;
        $this->save();
    }
}
