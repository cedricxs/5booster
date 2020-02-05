<?php
    namespace App\Http\Model;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    class User extends Authenticatable{

        use Notifiable;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'user_id', 'username', 'password',
            'telephone','birthday','sex','email','remember_token',
        ];
        protected $primaryKey = 'user_id';
        //public $timestamps = false;
        protected $table = 'User';
    }
