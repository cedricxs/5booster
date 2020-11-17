<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_theme', 'theme_name',
        'parent','choice',
    ];


    protected $primaryKey = 'id_theme';
    public $timestamps = true;
    protected $table = 'theme';
    public function isSubtheme(){
        return $this->parent == 0? false:true;
    }


    public function unlockedBy($user_id)
    {
        $record = UserChooseTheme::where(['user_id'=>$user_id,'id_theme'=>$this->id_theme])->get();
        return $record->isEmpty() ? false : true;
    }
}
