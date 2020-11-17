<?php
    namespace App\Http\Model;
    use Carbon\Carbon;
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
            'remember_token','email_verified_at','isAdmin','questionnaire',
            'image',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
        public $profiles = ['user_id','username','birthday',
            'sex','email','email_verified_at','questionnaire','image'];

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
            return $charge;
        }

        public function hasAbonner()
        {
            return ($this->subscribed('boost') || $this->subscribed('max_boost'));
        }
        public function hasRepondreQuestionnaire(){
            return $this->questionnaire;
        }

        public function getProfile()
        {
            $profile = [];
            foreach ($this->profiles as $profile_item){
                $profile[$profile_item] = $this[$profile_item];
            }
            $subName = [];
            $subs = $this->subscriptions()->getResults();
            foreach ($subs as $sub){
                $subName[] = $sub->name;
            }
            $profile['subName'] = $subName;
            return $profile;
        }

        //get the theme current of the user record in table userchoosetheme
        public function ThemeCurrentRecord()
        {
            //get all big theme that has been unlocked
           $unlockedThemes = UserChooseTheme::where(['user_id'=>$this->user_id,'theme_parent'=>0])->get();
           $now = Carbon::now();
           foreach ($unlockedThemes as $unlockedTheme){
               $end_at = Carbon::parse($unlockedTheme->end_at);
               //has big theme not end
               if($now->getTimestamp()<$end_at->getTimestamp())
                   return $unlockedTheme;
           }
           return null;
        }

        //get the sub-theme current of the user record in table userchoosetheme
        public function SubthemeCurrentRecord($parent)
        {
            //get all big theme that has been unlocked
            $unlockedSubhemes = UserChooseTheme::where(['user_id'=>$this->user_id,'theme_parent'=>$parent])->get();
            $now = Carbon::now();
            foreach ($unlockedSubhemes as $unlockedSubheme){
                $end_at = Carbon::parse($unlockedSubheme->end_at);
                //has sub-theme not end
                if($now->getTimestamp()<$end_at->getTimestamp())
                    return $unlockedSubheme;
            }
            return null;
        }

        //determine if the user can unlock the theme, if not, return the reason theme.
        public function canUnlockTheme($id_theme)
        {
            $theme = Theme::find($id_theme);
            //invalid theme id
            if(is_null($theme))
                return false;
            $isSubtheme = $theme->isSubtheme();
            $themeCurrentRecord = $this->ThemeCurrentRecord();
            //mean that the theme want to unlock is a big theme which has 1 month period.
            if(!$isSubtheme){
                return is_null($themeCurrentRecord);
            }
            else{
                return !is_null($themeCurrentRecord)
                    && ($themeCurrentRecord->id_theme == $theme->parent)
                    && is_null($this->SubthemeCurrentRecord($themeCurrentRecord->id_theme));
            }
        }
    }
