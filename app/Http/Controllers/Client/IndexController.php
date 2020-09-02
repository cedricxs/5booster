<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Model\Post_Questionnaire;
use App\Mail\Contact_Coach;
use Faker\Provider\DateTime;
use  Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

class IndexController extends Controller
{
    public function client()
    {
        return view('client.sport');
    }

    public function espace()
    {
        $user = Auth::guard()->getUser();
        return view('client.compte')->with('user',$user);
    }

    public function abonnement(Request $request){
        $user = $request->user();
        return view('client.abonnement',['user'=>$user]);
    }

    public function sport(){
        return view('client.sport');
    }

    public function filtre(Request $request)
    {
        $user = $request->user();
        if($user->hasAbonner()&&!$user->hasRepondreQuestionnaire()){
            return view('client.repondre_questionnaire_svp');
        }
        else
            return view('client.filtre');
    }
    public function recettes()
    {
        return view('client.recettes');
    }
    public function perso()
    {
        return view('client.perso');
    }
    public function coach()
    {
        return view('client.coach');
    }
    public function formulaire(Request $request)
    {
        $data = [
            'has_submit_questionnaire' => $request->user()->questionnaire,
            'redo_questionnaire' => false
        ];
        return view('client.formulaire')->with('has_submit_questionnaire',$data['has_submit_questionnaire'])
            ->with('redo_questionnaire',$data['redo_questionnaire']);
    }
    public function tendances()
    {
        return view('client.tendances');
    }
    public function prog_perso()
    {
        return view('client.prog_perso');
    }

    public function contact_coach(Request $request)
    {
        $subject = $request['subject'];
        $content = $request['content'];
        $user = $request->user();
        $message = new Contact_Coach($subject, $content,$user);
        Mail::to(config('mail.coach'))->send($message);
        return back()->with('msg','You have sent the email to the coach.');
    }

    public function post_questionnaire(Request $request)
    {
        $data = $request->all();
        foreach ($data as $question_id=>$answer) {
            $post = [
                'question_id'=>str_replace('question_','',$question_id),
                'user_id'=>$request->user()->user_id,
                'answer'=>$answer
            ];
            $exist = Post_Questionnaire::where(['user_id'=>$post['user_id'],'question_id'=>$post['question_id']])->get();
            if($exist->isEmpty())
                Post_Questionnaire::create($post);
            else{
                foreach ($exist as $exist){
                    $exist->answer = $post['answer'];
                    $exist->save();
                }
            }

        }
        $user = $request->user();
        $user->questionnaire = true;
        $user->save();

        return Response::json(['msg'=>'ok']);
    }

    public function reset_questionnaire(Request $request)
    {
        $all_posts = Post_Questionnaire::where('user_id',"=",$request->user()->user_id)->get();
        $data = [
            'has_submit_questionnaire' => $request->user()->questionnaire,
            'redo_questionnaire' => true,
            'all_posts'=>$all_posts
        ];
        return view('client.formulaire')->with('has_submit_questionnaire',$data['has_submit_questionnaire'])
            ->with('redo_questionnaire',$data['redo_questionnaire'])
            ->with('all_posts',$data['all_posts']);
    }

    public function ajouter_payment(Request $request)
    {
        $user = $request->user();

//        dd($user->paymentMethods());
//        if(isset($user)){
//            $stripeCustomer = $user->createOrGetStripeCustomer();
//            return $stripeCustomer;
//        }

        return view('update-payment-method', [
            'intent' => $user->createSetupIntent(),
        ]);

    }

    public function abonner($abonnement, Request $request)
    {
//        if(!$request->user()->hasPaymentMethod()){
//            return redirect('/client/ajoute_payment');
//        }
        if($abonnement == 'free'){
            return back();
        }
        if($request->user()->subscribed($abonnement)){
            return back();
        }
        return view('payment.payment_abonner',[
            'abonnement' => $abonnement,
        ]);
    }

    public function succeeded(Request $request)
    {
        $user = $request->user();
        $invs = $user->invoices();
        $inv = $invs[0];
        //$items = $invs[0]->lines['data'];
        return view('payment.succeeded',['inv'=>$inv]);
    }
    public function failed()
    {
        return view('payment.failed');
    }

    public function invoice($invoice_id, Request $request)
    {
        return $request->user()->downloadInvoice($invoice_id, [
            'vendor' => '5booster',
            'product' => 'boost',
        ]);
    }

    public function alipay(Request $request)
    {
        return view('payment.alipay',['amount'=>1500,
            'currency'=>config('cashier.currency'),
            'redirect_url'=>url('/client/payer/alipay_ready')]);
    }

    //此处应为webhook
    public function alipay_ready(Request $request)
    {
//        $user = $request->user();
//        $user->chargeWithSource($request['amount'], $request['source']);
        $source = $request;
        $email = $source['email'];
        $user = User::first();
        $amount = $source['amount']??1500;
        $source_id = $source['source'];
        $user->chargeWithSource($amount, $source_id);
    }

}
