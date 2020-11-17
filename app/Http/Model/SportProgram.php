<?php


namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class SportProgram extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_program', 'program_name',
        'program_video_url','view','niveau','object'
    ];


    protected $primaryKey = 'id_program';
    public $timestamps = true;
    protected $table = 'sportprogram';

}
