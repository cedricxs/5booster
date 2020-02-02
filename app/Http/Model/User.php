<?php
    namespace App\Http\Model;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    class User extends Authenticatable{

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'user_id', 'username', 'password',
            'telephone','birthday','sex','email',
        ];
        protected $primaryKey = 'user_id';
        //public $timestamps = false;
        protected $table = 'users';
    }
