<?php
    namespace App\Http\Model;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Laravel\Cashier\Billable;
    use Stripe\Charge;
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
            'remember_token','email_verified_at','isAdmin','questionnaire'
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

        public function chargeWithSource($amount, $source_id, array $options = []){
            $options = array_merge([
                'currency' => $this->preferredCurrency(),
            ], $options);
            $options['amount'] = $amount;
            $options['source'] = $source_id;
            $charge = Charge::create($options, $this->stripeOptions());
        }

        public function hasAbonner()
        {
            return ($this->subscribed('boost') || $this->subscribed('max_boost'));
        }
        public function hasRepondreQuestionnaire(){
            return $this->questionnaire;
        }
    }
