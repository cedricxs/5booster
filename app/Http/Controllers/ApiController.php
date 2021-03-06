<?php


namespace App\Http\Controllers;
use App\Http\Model\Question;
use App\Http\Model\Recette;
use App\Http\Model\User;
use App\Http\Model\WeekProgram;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;

class ApiController extends Controller
{
    public function getPrograms(Request $request){
        //01/09/2020 1ere semaine
        $user = $request->user();
        $week_number = (int)ceil((date_create()->getTimestamp()-date_create('2020-08-01')->getTimestamp())/(7*24*3600));
        if($user->hasAbonner()){
            $programs = WeekProgram::where('week_number','=',$week_number)->get();
        }
        else{
            $programs = WeekProgram::where(['free'=>true,'week_number'=>$week_number])->get();
        }


        $json = $programs->toArray();
        return Response::json($json);
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

    public function setupIntent(Request $request)
    {
        $intent = $request['intent'];
        $user = $request->user();
        $user->addPaymentMethod($intent['payment_method']);
        return 'register payment method successfully';
    }

    public function abonner(Request $request)
    {
        $abonnement = $request['abonnement'];
        $paymentMethod = $request['paymentMethod'];
        $user = $request->user();

        //$result = $user->charge($amount,$paymentMethod['id']);
        $sub = $user->newSubscription($abonnement,config('cashier.plan_id')[$abonnement]);
        $sub
            //->trialDays(7)
            ->create($paymentMethod['id']);
        return Response::json(['status'=>'ok']);
    }

    public function change_locale(Request $request)
    {
        //这里setlocale不起作用,只限于当此请求的runtime,无记忆
        App::setLocale($request['locale']);
        $cookie = cookie('locale',$request['locale'],24*60);
        return Response::json(['status'=>$request['locale']])->withCookie($cookie);
    }

}
