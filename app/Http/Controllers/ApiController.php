<?php


namespace App\Http\Controllers;
use App\Http\Model\MindsetProgram;
use App\Http\Model\Question;
use App\Http\Model\Recette;
use App\Http\Model\SportProgram;
use App\Http\Model\Theme;
use App\Http\Model\User;
use App\Http\Model\UserChooseTheme;
use App\Http\Model\WeekProgram;
use Carbon\Carbon;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;
use Laravel\Cashier\Exceptions\PaymentActionRequired;
use Laravel\Cashier\Exceptions\PaymentFailure;
use function MongoDB\BSON\toJSON;
use Stripe\PaymentIntent as StripePaymentIntent;

class ApiController extends Controller
{
    public function getProfile(Request $request)
    {
        $user  = $request->user();
        return Response::json($user->getProfile());

    }
    public function getPrograms(Request $request){
//        $user = $request->user();
//        $week_number = (int)ceil((date_create()->getTimestamp()-date_create('2020-08-01')->getTimestamp())/(7*24*3600));
//        if($user->hasAbonner()){
//            $programs = WeekProgram::where('week_number','=',$week_number)->get();
//        }
//        else{
//            $programs = WeekProgram::where(['free'=>true,'week_number'=>$week_number])->get();
//        }
//
//
//        $json = $programs->toArray();
//        return Response::json($json);
        $programs = SportProgram::all();
        return Response::json($programs,200,[],JSON_UNESCAPED_SLASHES);
    }

    public function getThemes(Request $request, $themeId)
    {
        $user = $request->user();
        $themes = Theme::where(['parent'=>$themeId])->get();
        foreach ($themes as $theme){
            $theme['unlocked'] = $theme->unlockedBy($user->user_id)?true:false;
        }
        return Response::json($themes,200);
    }

    public function getThemeById(Request $request, $themeId)
    {
        $theme = Theme::find($themeId);
        if(is_null($theme))
            return Response::json(['msg'=>'can\'t find the theme.'],400);
        return Response::json($theme,200);
    }

    public function unlockTheme(Request $request, $themeId)
    {
        $user = $request->user();
        if(!$user->canUnlockTheme($themeId))
            return Response::json(['msg'=>'can\'t unlock the theme.'],400);
        $theme = Theme::find($themeId);
        $isSubtheme = $theme->isSubtheme();
        $end_at = $isSubtheme ? Carbon::now()->addRealWeek()->floorDay():Carbon::now()->addRealMonth()->floorDay();
        UserChooseTheme::create(['user_id'=>$user->user_id,'id_theme'=>$themeId,
                                'end_at'=>$end_at,'theme_parent'=>$theme->parent]);
        $theme->choice ++;
        $theme->save();
        return Response::json(['msg'=>'unlock the theme successfully.','unlockedtheme'=>$theme],200);
    }

    public function getMindsetPrograms(Request $request, $themeId)
    {
        //if the sub theme has not been unlocked
        $theme = Theme::find($themeId);
        if(is_null($theme))
            return Response::json(['msg'=>'can\'t find the sub-theme.'],400);
        if(!$theme->unlockedBy($request->user()->user_id)){
            return Response::json(['msg'=>'locked sub-theme.'],400);
        }
        $mindsetPrograms = MindsetProgram::where(['id_theme'=>$themeId])->get();
        return Response::json($mindsetPrograms);
    }

    public function getMindsetProgramsById(Request $request, $mindsetprogramId)
    {
        $mindsetprogram = MindsetProgram::find($mindsetprogramId);
        if(is_null($mindsetprogram))
            return Response::json(['msg'=>'can\'t find the mindset program.'],400);
        $theme = Theme::find($mindsetprogram->id_theme);
        if(!$theme->unlockedBy($request->user()->user_id)){
            return Response::json(['msg'=>'locked sub-theme.'],400);
        }
        $name = $mindsetprogram->mindsetprogram_name;
        //PDF file is stored under project/storage/app/mindsetprograms/info.pdf
        $file_path = storage_path().$mindsetprogram->mindsetprogram_url;
        $extension = pathinfo($mindsetprogram->mindsetprogram_url, PATHINFO_EXTENSION);
        return Response::download($file_path,"$name.$extension");
    }

    public function getRecettes(){
        $recettes = Recette::all();
        $json = $recettes->toArray();
        return Response::json($json);
    }

    public function getQuestionnaire()
    {
        $question = Question::all();
        $json = $question->toArray();
        return Response::json($json);
    }

    //在获取paymentMethod后使用此方法来为用户添加支付方式,但是不应用在setupConfirm之后,
    //因为setupConfirm专门自动为用户添加
    public function setupIntent(Request $request)
    {
        $intent = $request['intent'];
        $user = $request->user();
        $user->addPaymentMethod($intent['payment_method']);
        return 'register payment method successfully';
    }

    public function getAbonnement(Request $request, $subName)
    {
        $user = $request->user();
        $sub = $user->subscription($subName);
        if(is_null($sub)){
            return Response::json(['msg'=>'no subscription'],400);
        }
        return Response::json($sub,200);
    }

    public function abonnerByDefaultPaymentmethod(Request $request)
    {
        $abonnement = $request['abonnement'];
        $user = $request->user();
        $sub = $user->newSubscription($abonnement,config('cashier.plan_id')[$abonnement]);
        try{
            $subDB = $sub
                //->trialDays(7)
                ->create($user->defaultPaymentMethod()->id);
            return Response::json(['msg'=>'subscribe successfully','subscription'=>$subDB],200);
        }catch (PaymentFailure | PaymentActionRequired $e){
            return Response::json(['msg'=>$e->getMessage()],400);
        }
    }
    public function abonner(Request $request)
    {
        $abonnement = $request['abonnement'];
        $paymentMethod = $request['paymentMethod'];
//        if(isset($request['payment_intent_id'])){
//            $payment_intent_confirmed = StripePaymentIntent::retrieve($request['payment_intent_id']);
//            $payment_intent_confirmed->confirm();
//            $subDB = ;
//            return Response::json(['msg'=>'subscribe successfully','subscription'=>$subDB],200);
//        }
        $user = $request->user();
        //$result = $user->charge($amount,$paymentMethod['id']);
        $sub = $user->newSubscription($abonnement,config('cashier.plan_id')[$abonnement]);
        try{
            $subDB = $sub
                //->trialDays(7)
                ->create($paymentMethod['id']);
            return Response::json(['msg'=>'subscribe successfully','subscription'=>$subDB],200);
        }catch (PaymentFailure $e){
            return Response::json(['msg'=>$e->getMessage()],400);
        }catch (PaymentActionRequired $e){
            return Response::json(['msg'=>$e->getMessage(),'payment_intent'=>$e->payment],400);
        }


    }

    public function cancelAbonnement($subName, Request $request)
    {
        $user = $request->user();
        $sub = $user->subscription($subName);
        if(is_null($sub)){
            return Response::json(['msg'=>'no subscription'],400);
        }
        $sub = $sub->cancel();
        return Response::json(['msg'=>'cancel the subscription successfully','subscription_cancelled'=>$sub],200);
    }

    public function all_Invoices(Request $request)
    {
        $user = $request->user();
        $invoices = $user->invoicesIncludingPending()->all();
        $res = [];
        foreach ($invoices as $invoice){
            $res[] = ['invoice_id'=>$invoice->id,
                        'date'=>$invoice->date(),
                ];
        }
        return Response::json($res,200);
    }

    public function allPaymentMethods(Request $request)
    {
        $user = $request->user();
        $payment_methods = $user->paymentMethods();
        dd($payment_methods);
        return Response::json($payment_methods);
    }

    public function defautPaymentPcard(Request $request)
    {
        $user = $request->user();
        return Response::json(['card_brand'=>$user->card_brand,'card_last_four'=>$user->card_last_four],200);
    }

    public function updateDefaultPaymentPcard(Request $request)
    {
        $new_payment_method = $request->payment_method;
        $user = $request->user();
        $user->updateDefaultPaymentMethod($new_payment_method);
        return Response::json(['msg'=>'update payment card successfully','card'=>['card_brand'=>$user->card_brand,
                                                                                    'card_last_four'=>$user->card_last_four]]);
    }
    public function change_locale(Request $request)
    {
        //这里setlocale不起作用,只限于当此请求的runtime,无记忆
        App::setLocale($request['locale']);
        $cookie = cookie('locale',$request['locale'],24*60);
        return Response::json(['status'=>$request['locale']])->withCookie($cookie);
    }

}
