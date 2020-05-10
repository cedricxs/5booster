<?php


namespace App\Http\Controllers;
use App\Http\Model\Question;
use App\Http\Model\Recette;
use App\Http\Model\User;
use App\Http\Model\Workout;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    public function getWorkouts(){
        $workouts = Workout::all();
        $json = $workouts->toArray();
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
        $cookie = cookie('locale',$request['locale'],60*24);
        return Response::json(['status'=>'ok'])->withCookie($cookie);
    }

}
