<?php
    namespace App\Http\Model;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Laravel\Cashier\Billable;
    class User extends Authenticatable{

        use Billable;
        use Notifiable;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'user_id', 'username', 'password',
            'telephone','birthday','sex','email',
            'remember_token','email_verified_at',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        protected $primaryKey = 'user_id';
        //public $timestamps = false;
        protected $table = 'users';
    }
