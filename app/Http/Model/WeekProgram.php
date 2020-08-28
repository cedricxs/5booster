<?php


namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class WeekProgram extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_week_program', 'week_number', 'url_pdf'
    ];


    protected $primaryKey = 'id_week_program';
    //public $timestamps = false;
    protected $table = 'WeekProgram';

}
